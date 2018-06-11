<?php
/*
 * Model for everything concering the 'resident' part of the caregivers side
 */

class Residentpage_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllResidents() {
        $query = $this->db->query("SELECT * FROM Resident");
        return $query->result_array();
    }
    public function getResidentsBySearch($name)
    {
         $query = $this->db->query("SELECT * FROM Resident "
                 . "WHERE firstName "
                 . "LIKE '%".$this->db->escape_like_str($name)."%' ESCAPE '!' "
                 . "OR lastName "
                 . "LIKE '%".$this->db->escape_like_str($name)."%' ESCAPE '!'");
        return $query->result_array();
    }
    
    public function getResidentWithId($id) {
        $this->lang->load('IndivResident_lang', $this->session->language); //for language concerning profile
        $query = $this->db->query("SELECT * FROM Resident WHERE idResident = ".$this->db->escape($id)."");
        $resident = $query->row();
        $data['firstName'] = $resident->firstName;
        $data['lastName'] = $resident->lastName;
        $sector = $this->Residentpage_model->getSectorWithId($resident->Sectors_idSector);
        if (isset($sector))
            $data['sector'] = $sector->name;
        else
            $data['sector'] = lang("not set");
        $data['gender'] = lang("IndivRes_".$resident->gender);
        $data['photo'] = $resident->photo;        
        if (isset($resident->roomNr))
            $data['roomNr'] = $resident->roomNr;
        else
            $data['roomNr'] = lang("not set");
        $data['birthday'] = $resident->birthDate;
        $data['language'] = lang("IndivRes_".$resident->lang);
        $data['married'] = $resident->married ? lang("IndivRes_yes") : lang("IndivRes_no");
        $data['children'] = $resident->children;
        $data['notes'] = $this->Residentpage_model->getResidentNotes($this->session->resident_id);
        return $data;
    }
    
    public function getResidentNotes($id) {
        $query = $this->db->query("SELECT * FROM Notes WHERE Resident_idResident = ".$this->db->escape($id)."");
        return $query->result_array();
    }
    
    
    public function getResidentFromSector($sectorId){
        $query = $this->db->query("SELECT * FROM Resident WHERE Sectors_idSector = ".$this->db->escape($sectorId)."");
        return $query->result_array();
    }
    
    public function getSectorWithId($id) {
        if(isset($id)) {
            $query = $this->db->query("SELECT * FROM Sectors WHERE idSector = ".$this->db->escape($id)."");
            return $query->row();
        }
        else return null;
    }
    
    public function getResidentUrgProblems($id) {
        $query = $this->db->query("SELECT * FROM Problems WHERE Resident_idResident = ".$this->db->escape($id)." AND urgent = 1");
        return $query->result_array();
    }
    
    public function getResidentNonUrgProblems($id) {
        $query = $this->db->query("SELECT * FROM Problems WHERE Resident_idResident = ".$this->db->escape($id)." AND urgent = 0");
        return $query->result_array();
    }
    
    public function addResidentUrgProblems($id,$text) {
        
         $urgProbsLength = strlen($text);
            if($urgProbsLength > 37){
                $urgMarginTop = 0;
            }
            else{
                $urgMarginTop = 15;
            }    
           $data = array(
            'Resident_idResident' => $id,
            'urgent' => 0,
            'text' => $text,          
            'marginTop' => $urgMarginTop
        ); 
        $this->db->insert('Problems', $data);
    }
    
    public function addResidentNotes($note,$resident_id){
         $noteLength = strlen($note);
            if($noteLength > 37){
                $noteMarginTop = 0;
            }
            else{
                $noteMarginTop = 15;
            }  
       
        $data=array(
                'Resident_idResident' => $resident_id,
                'text' => $note,
                'marginTopNote' => $noteMarginTop
            );
        $this->db->insert('Notes',$data);    
    }
  
    public function addResidentNonUrgProblems($id,$text) {
      
         $urgProbsLength = strlen($text);
            if($urgProbsLength > 37){
                $urgMarginTop = 0;
            }
            else{
                $urgMarginTop = 15;
            }    
           
        
           $data = array(
            'Resident_idResident' => $id,
            'urgent' => 1,
            'text' => $text,   
            'marginTop' =>  $urgMarginTop
        ); 
        $this->db->insert('Problems', $data);
    }
    
    function deleteProblems($ids) {
        foreach($ids as $id) {
            $this->db->where('idProblem', $id);
            $this->db->delete('Problems');
        }
    }
    
    function deleteNotes($ids) {
        foreach($ids as $id) {
            $this->db->where('noteId', $id);
            $this->db->delete('Notes');
        }
    }
    
    public function getTopicScore($resident_id,$topic_id){
        $query = $this->db->query("SELECT round(AVG(Answer),1) as avg FROM Resident_fills_in_Topics  INNER JOIN Answers
                                WHERE Timestamp IN
                                (SELECT MAX(Timestamp) FROM Resident_fills_in_Topics
                                INNER JOIN Answers
                                where Resident_fills_in_Topics.id_fill_in = Answers.fill_in_id
                                AND Resident_idResident = ".$this->db->escape($resident_id)."
                                AND Topics_idTopic = ".$this->db->escape($topic_id).")
                                AND Resident_fills_in_Topics.id_fill_in = Answers.fill_in_id
                                AND Resident_idResident = ".$this->db->escape($resident_id)."
                                AND Topics_idTopic = ".$this->db->escape($topic_id).";" );
        return $query->row();          
    }
    
    
        public function getLastSecondScore($resident_id,$topic_id){
        $query = $this->db->query("SELECT round(AVG(Answer),1) as avgSecondLast FROM a17_webapps04.Resident_fills_in_Topics  INNER JOIN a17_webapps04.Answers
                                WHERE Timestamp IN
                                (SELECT MAX(Timestamp) as timeSecondLast FROM a17_webapps04.Resident_fills_in_Topics
                                    INNER JOIN a17_webapps04.Answers
                                    where a17_webapps04.Resident_fills_in_Topics.id_fill_in = a17_webapps04.Answers.fill_in_id
                                    AND Resident_idResident = ".$this->db->escape($resident_id)."
                                    AND Topics_idTopic = ".$this->db->escape($topic_id)."
                                    AND Timestamp < (SELECT MAX(Timestamp) as lastTime FROM a17_webapps04.Resident_fills_in_Topics
                                    INNER JOIN a17_webapps04.Answers
                                    where a17_webapps04.Resident_fills_in_Topics.id_fill_in = a17_webapps04.Answers.fill_in_id
                                    AND Resident_idResident = ".$this->db->escape($resident_id)."
                                    AND Topics_idTopic =".$this->db->escape($topic_id)."))
                                AND a17_webapps04.Resident_fills_in_Topics.id_fill_in = a17_webapps04.Answers.fill_in_id
                                AND Resident_idResident  = ".$this->db->escape($resident_id)."
                                AND Topics_idTopic = ".$this->db->escape($topic_id).";" );
        return $query->row();          
    }
    
    public function getLastTime($resident_id,$topic_id){
        $query = $this->db->query("SELECT MAX(Timestamp) as lastTime FROM a17_webapps04.Resident_fills_in_Topics
                                    INNER JOIN a17_webapps04.Answers
                                    where a17_webapps04.Resident_fills_in_Topics.id_fill_in = a17_webapps04.Answers.fill_in_id
                                    AND Resident_idResident = ".$this->db->escape($resident_id)."
                                    AND Topics_idTopic =".$this->db->escape($topic_id).";"
                );
        return $query->row();
    }
    
    public function getSecondLastTime($resident_id,$topic_id){
         $query = $this->db->query("SELECT MAX(Timestamp) as timeSecondLast FROM a17_webapps04.Resident_fills_in_Topics
                                    INNER JOIN a17_webapps04.Answers
                                    where a17_webapps04.Resident_fills_in_Topics.id_fill_in = a17_webapps04.Answers.fill_in_id
                                    AND Resident_idResident =".$this->db->escape($resident_id)."
                                    AND Topics_idTopic = ".$this->db->escape($topic_id)."
                                    AND Timestamp < (SELECT MAX(Timestamp) as lastTime FROM a17_webapps04.Resident_fills_in_Topics
                                    INNER JOIN a17_webapps04.Answers
                                    where a17_webapps04.Resident_fills_in_Topics.id_fill_in = a17_webapps04.Answers.fill_in_id
                                    AND Resident_idResident =".$this->db->escape($resident_id)."
                                    AND Topics_idTopic = ".$this->db->escape($topic_id).");"
                );
        return $query->row();
    }
    
    public function getAvgScoreTotal($resident_id){
        
    }
    
    public function addResidentAvgScoreTotal($id,$avgScore_last) {
        
        
        if($avgScore_last >= 4){
            $faceImage = 'http://a17-webapps04.studev.groept.be/upload/happyhappy.png';
        }
        else if($avgScore_last >= 3){
            $faceImage = 'http://a17-webapps04.studev.groept.be/upload/happy.png';  
        }else if($avgScore_last >= 2){
            $faceImage = 'http://a17-webapps04.studev.groept.be/upload/sadsadsad.png';
        }
        else if($avgScore_last >= 1){
            $faceImage = 'http://a17-webapps04.studev.groept.be/upload/sadsad.png';
        }else{
            $faceImage = 'http://a17-webapps04.studev.groept.be/upload/sad.png';
        }
           $data = array(
            'avgLastScore' => $avgScore_last, 
            'faceImage'=> $faceImage
        ); 

        $this->db->where('idResident', $id);
        $this->db->update('Resident', $data);
 
    }
    
    public function updateSector($resident_id,$sector){
        
           $data = array(
            'Sectors_idSector' =>  $sector
        ); 
        $this->db->where('idResident', $resident_id);
        $this->db->update('Resident', $data);
    }
    
    public function updateRoom($resident_id, $room) {
        $data = array(
            'roomNr' =>  $room
        ); 
        $this->db->where('idResident', $resident_id);
        $this->db->update('Resident', $data);
    }
    
    public function getFamilyId($resident_id) {
        $query = $this->db->query("SELECT * FROM Family_knows_Resident WHERE idResident = ".$resident_id."");
        return $query->result_array();
    }
    
    public function getQRLogin($resident_id) {
        $this->db->where('idResident', $resident_id);
        $this->db->select('QRlogin');
        $query = $this->db->get('Resident');
        return $query->result_array();
    }
}
