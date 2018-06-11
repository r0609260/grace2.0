<?php

class Question_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getQuestions($topicId) {
        if (!isset($topicId)) {
            $topicId = 1;
        }
        $questionLang = $this->session->questionLang; //get the right columnname for the language
        $topicLang = $this->session->topicLang; //get the right columnname for the language
        //get the questions and store them temporarily in session
        $questions = $this->db->query("SELECT idQuestion, $questionLang AS questionString FROM Questions WHERE Topics_idTopic = '$topicId'");
        $this->session->set_userdata('topicQuestions', $questions->result());   //get all questins of current topic and store them in session
        //get the topic name and store it temporarily in session
        $topicName = $this->db->query("SELECT idTopic, $topicLang AS topicName FROM Topics WHERE idTopic = '$topicId'");
        $this->session->set_userdata('topicName', $topicName->result()[0]->topicName);
        $this->session->set_userdata('topicId', $topicName->result()[0]->idTopic);
    }
    
    public function getQuestionIds($topicId) {
        return $this->db->query("SELECT idQuestion FROM Questions WHERE Topics_idTopic = ".$this->db->escape($topicId)."")->result_array();
    }

    public function getTopics() {
        $topicLang = $this->session->topicLang; //get the right columnname for the language
        $query = $this->db->query("SELECT idTopic, $topicLang AS topicName FROM Topics");
        return $query->result_array();
    }
    
    public function storeAnswers($answerArray){
        date_default_timezone_set("Europe/Brussels");
        //make a new 'resident fills in topics' entry
        $fillInData = array(
            "id_fill_in" => "",
            "Resident_idResident" => $this->session->userdata("id"),
            "Topics_idTopic" => $this->session->userdata("topicId"),
            "Timestamp" => date("Y-m-d") //timestamp doesn't work yet
        );
        $this->db->insert('Resident_fills_in_Topics', $fillInData);
        //insert all answers into the database
        $fillInId = $this->db->insert_id();
        foreach($answerArray as $answerRow){
            $data = array(
                "fill_in_id" => $fillInId,
                "Questions_idQuestion" => $answerRow['questionId'],
                "Answer" => $answerRow['score']
            );
            $this->db->insert('Answers', $data);
        }
    }

    public function getScores($sector, $from, $to) {
        $total = NULL;
        //get residents from a certain sector
        if ($sector == -1) {
            $residents = $this->db->query("SELECT idResident from Resident")->result();   //select all residents
        } else {
            $residents = $this->db->query("SELECT idResident from Resident "
                            . "WHERE Sectors_idSector = ".$this->db->escape($sector)."")->result();   //select all residents from a sector
        }
        if ($residents == null)
            return null;
        //loop over all topics
        for ($topic = 1; $topic <= 11; $topic++) {            
            $ids = $this->getFillInIds($residents, $topic, $from, $to); //get all fil_in_ids from selected residents
            //calculate the average per topic
            $topic_scores = $this->db->query("SELECT ROUND(AVG(Answer), 2) AS avg "
                            . "FROM Answers "
                            . "WHERE fill_in_id IN ('$ids') "
                            . "AND Answer <> '5'")->row();
            //calculte the average per question
            $question_scores = $this->db->query("SELECT Questions_idQuestion AS qId, "
                            . "ROUND(AVG(NULLIF(Answer, 5)), 2) AS avg "
                            . "FROM Answers "
                            . "WHERE fill_in_id IN ('$ids') "                            
                            . "GROUP BY Questions_idQuestion")->result();
            //store topic and question averages in $total variable
            $total['topic_avg'][$topic] = $topic_scores->avg != null ? $topic_scores->avg : '/';            
            $total['question_avgs'][$topic] = $question_scores;         
        }
        return $total;
    }

    public function getChartScores($sector, $from, $to) {
        $questions = null;
        //get residents from a certain sector
        if ($sector == -1) {
            $residents = $this->db->query("SELECT idResident from Resident")->result();   //select all residents from a sector
        } else {
            $residents = $this->db->query("SELECT idResident from Resident "
                            . "WHERE Sectors_idSector = ".$this->db->escape($sector)."")->result();   //select all residents from a sector
        }
        if ($residents == null)
            return null;
        //loop over all topics
        for ($topic = 0; $topic <= 11; $topic++) {                   
            $ids = $this->getFillInIds($residents, $topic, $from, $to); //get all fil_in_ids from selected residents
            $this->getQuestions($topic);    //get the questions and set them in session variable
            //loop over all questions and count the answers
            foreach ($this->session->topicQuestions as $q) {
                $questions[$q->idQuestion] = array($q->questionString, 0, 0, 0, 0, 0, 0);  //set question text and set initial answer counts to 0
                $scores = $this->db->query("SELECT Answers.Answer
                FROM Answers
                INNER JOIN Questions 
                ON Answers.Questions_idQuestion=Questions.idQuestion
                WHERE Questions.Topics_idTopic = '$topic'
                AND Answers.fill_in_id IN ('$ids')
                AND Answers.Questions_idQuestion = '$q->idQuestion';")->result(); 
                //count the answers and store it in $questions at index = quesion id
                $questions = $this->countAnswers($q->idQuestion, $scores, $questions);  
            }
        }
        return $questions;
    }

    function countAnswers($qId, $answers, $qArray) {
        foreach ($answers as $a) {
            switch ($a->Answer) {
                case 0: $qArray[$qId][1] += 1;
                    break;
                case 1: $qArray[$qId][2] += 1;
                    break;
                case 2: $qArray[$qId][3] += 1;
                    break;
                case 3: $qArray[$qId][4] += 1;
                    break;
                case 4: $qArray[$qId][5] += 1;
                    break;
                case 5: $qArray[$qId][6] += 1;
                    break;
            }
        }
        return $qArray;
    }
    
    public function getFillInIds($residents, $topic, $from, $to) {        
            $i = 0;
            $all_residents = null; 
            //loop over all residents and store ids in array
            foreach ($residents as $res) {
                $all_residents[$i] = $res->idResident;
                $i++;
            }
            //prepare resident ids to be used in SQL query
            if (isset($residents))
                $r = join("','", $all_residents);
            else
                $r = '';
            //get all fill_in_ids
            $fill_in_ids = $this->db->query("SELECT id_fill_in FROM Resident_fills_in_Topics "
                            . "WHERE Timestamp >= ".$this->db->escape($from)." "
                            . "AND Timestamp <= ".$this->db->escape($to)." "
                            //. "IN (SELECT MAX(Timestamp) "
                            //. "FROM Resident_fills_in_Topics "
                            //. "WHERE Resident_idResident IN ('$r') "
                            //. "AND Topics_idTopic = '$topic' "
                            //. "AND Timestamp >= ".$this->db->escape($from)." "
                            //. "AND Timestamp <= ".$this->db->escape($to)." "
                            //. "GROUP BY Resident_idResident) "
                            . "AND Topics_idTopic = '$topic' "
                            . "AND Resident_idResident IN ('$r') ")->result();               
            $j = 0;
            $all_ids = null;
            //loop over fill_in_ids and store them in array
            foreach ($fill_in_ids as $id) {
                $all_ids[$j] = $id->id_fill_in;
                $j++;
            }
            //prepare ids for SQL query and return them
            if (isset($all_ids))
                $ids = join("','", $all_ids);
            else
                $ids = '';
            return $ids;
    }

}
