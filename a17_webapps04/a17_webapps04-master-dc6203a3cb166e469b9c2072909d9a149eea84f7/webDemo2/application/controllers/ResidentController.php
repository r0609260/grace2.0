 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ResidentController extends CI_Controller {
    
    private $language;
    private $navLangArray;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
          $this->load->helper('url');
     
        $this->load->model('Language_model');
        $this->load->model('Notification_model');
        $this->navLangArray = $this->Language_model->getResNavLanguage();
    }
    
    public function question($questionNr) {
        $this->checkIfLoggedIn();
        $this->load->model('Question_model');
        $this->load->model('Residentpage_model');
        
        //if coming from post method, you come from the select topic page => reset everything
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $topicId = (int)array_keys(filter_input_array(INPUT_POST))[0];
            if(isset($topicId)){
                $this->session->unset_userdata('topicQuestions');
                $this->session->unset_userdata('topicName');
                $this->session->unset_userdata('answers');
                $this->session->set_userdata('topicId', $topicId);
            }
        }
        
        //get the questions from the topic if you haven't yet
        if(!isset($this->session->topicQuestions)){
            $this->Question_model->getQuestions($this->session->topicId);
        }
        
        
        if (!empty($this->session->topicQuestions [$questionNr])) {
            //if there is a next question
            $question = $this->session->topicQuestions[$questionNr]->questionString;
            $questionId = $this->session->topicQuestions[$questionNr]->idQuestion;
        } else {
            //if there is no other question of this topic
            //store answers in database BEFORE unsetting session data!
            $answers = $this->session->userdata('answers'); //all saved answers from the topic
            $this->Question_model->storeAnswers($answers);
            $average = ResidentController::averageTopic($answers);
            
            $resident_id=$this->session->userdata('id');
            $topicId = $this->session->userdata('topicId');
            
            for($i=1;$i<12;$i++){
                $score_last[$i] =  $this->Residentpage_model->getTopicScore($resident_id,$i)->avg;
                if($score_last[$i] == null){
                    $score_last[$i] = 0;
                }
            }
            
            $score_last[$topicId] = $this->Residentpage_model->getTopicScore($resident_id,$topicId)->avg;
          
            $a_last = array_filter($score_last);
            if(count($a_last) == 0){
                 $avgScore_last = 0;
            }else{
                $avgScore_last = array_sum($score_last)/count($a_last);
            }

            $this->Residentpage_model->addResidentAvgScoreTotal($resident_id,$avgScore_last);
            //If average is 5 it means al questions where skipped
           
            if($average < 5) {
                $topicId = $this->session->userdata('topicId');
                if($average < 2) {
                    $this->Notification_model->lowAverageNot($this->session->userdata('id'), $topicId);
                }
                else {
                    $this->Notification_model->topicNot($this->session->userdata('id'), $topicId);
                }
            }
            //redirect to 'end of topic' page
            $this->session->unset_userdata('topicQuestions');
            $this->session->unset_userdata('topicId');
            $this->session->unset_userdata('topicName');
            $this->session->unset_userdata('answers');
            //$this->session->set_userdata('topicId', $this->session->topicId + 1);
            redirect('ResidentController/end');
        }
        
        $topic = $this->session->topicName;
        
        $nextQuestionNr = $questionNr + 1;
        
        //workaround to create new input fields in view to pass values to javascript
        $hiddenQuestionNr = array(
            "value" => $nextQuestionNr,
            "id" => "hiddenQuestionNr",
            "type" => "hidden"
        );
        
        $hiddenQuestionId = array(
            "value" => $questionId,
            "id" => "hiddenQuestionId",
            "type" => "hidden"
        );
        
        $this->lang->load('ResidentQuestion_lang', $this->language);
        //put the question and topic title in array, then parse data
        $data = array_merge(array(
            "topic" => $topic,
            "question" => $question,
            "hiddenQuestionNr" => $hiddenQuestionNr,
            "hiddenQuestionId" => $hiddenQuestionId
            ),
            $this->navLangArray,
            $this->Language_model->getResQuestionLanguage()
            );
        $this->parser->parse('questionpage_new', $data);
    }
    
    public function averageTopic($answers) {
        $count = 0;
        $total = 0;
        for($i = 0; $i < count($answers); $i++) {
            if($answers[$i]['score'] < 5) {
                $total += $answers[$i]['score'];
                $count++;
            }
        }
        if($count > 0) return $total/$count;
        return 5;
    }
    
   

    public function topics(){
        $this->checkIfLoggedIn();
        $this->session->unset_userdata('answers');
        $this->Language_model->SetSessionLanguage();
        $this->load->model('Question_model');
        $topics = $this->Question_model->getTopics();
        $topicsChunks = array_chunk($topics, 4, true); //divide the query result in chunks of 4
        $htmlString = '';
        foreach($topicsChunks as $topicRow){
            $templateData = array_merge(array(
                'paragraph' => $topicRow
            ),$this->navLangArray);
            $tempString = $this->parser->parse('topicTemplate', $templateData, true);
            $htmlString .= $tempString; 
        }
        
        $data = array_merge(array(
            "topicButtons" => $htmlString,
            "name" => $this->session->name
        ),$this->navLangArray);
        
     
       
       
      
        $this->parser->parse('topicpageTest', $data);
    }
    
   
        public function test(){
        $this->checkIfLoggedIn();
        $this->load->view('resident_topicpage');
    }
    
    public function end(){
        $this->checkIfLoggedIn();
        $this->lang->load('ResidentQuestionEndpage_lang', $this->language);
        $data = array_merge($this->Language_model->getResQuestionEndLanguage(),
        $this->navLangArray);
       
        $this->parser->parse('question_endpage', $data);
    }
    
    public function home(){
        $this->checkIfLoggedIn();
        $this->load->view('residentHome');
    }
    
    public function login(){
        $this->input->get('lang') != null ? $lang = $this->input->get('lang') : $lang = 'dutch';
        $this->session->set_userdata('language', $lang);
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->load->model('Event_model');
            $qrCode = filter_input(INPUT_POST, "qr");
            if(preg_match('/^([f]?)([0-9]+)$/', trim($qrCode), $matches)){ //needed for family
                if(count($matches)>0){
                    $result = $this->Event_model->loginResident($matches[2]); //checks if qrcode exists
                    if($result){
                        /*
                        if($matches[1]=='f'){ //family login
                            $this->session->set_userdata('logged_in', 'family');
                            $this->session->set_userdata('id', $result[0]->idResident);
                            //redirect to right page
                            redirect('ResidentController/end');
                        }
                        else{ //resident login
                         *
                         */
                            $this->session->set_userdata('logged_in', 'resident');
                            $this->session->set_userdata('language', $result[0]->lang);
                            $this->session->set_userdata('name', $result[0]->firstName);
                            $this->session->set_userdata('id', $result[0]->idResident);
                            redirect('ResidentController/topics');
                        //}
                    }
                }
            }
        }
        $data = array_merge($this->Language_model->getResidentLoginLanguage());
        $this->parser->parse('login_resident', $data);
    }
    
   
    
    public function menu(){
        $this->checkIfLoggedIn();
        $this->load->model('Message_model');
        $messages = $this->Message_model->getAllMessages($this->session->id);
        $this->session->set_userdata('messages', $messages);
        $data = $this->Language_model->getResidentMenuLanguage();
        if(count($messages) == 0){
            $data['sentence2'] = $data['noMessages'];
            $data['messageDisabled'] = 'disabled';
        }
        else{
            $data['sentence2'] = $data['messagesAvailable'];
            $data['messageDisabled'] = '';
        }
        $this->parser->parse('resident_menu',$data);
    }
    
    public function message(){
        $this->checkIfLoggedIn();
        $this->load->model('Message_model');
        $messages = $this->session->userdata('messages');
        $this->session->set_userdata('messageNr', 0);
        $prevPhotoExists = "disabled";
        $nextPhotoExists = "";
        if(count($messages)==1){
            $nextPhotoExists = "disabled";
        }
        $data = array(
            'senderPhoto' => $messages[0]['photo'],
            'senderName' => $messages[0]['firstName'],
            'messageText' => $messages[0]['messageText'],
            'messagePhoto' => $messages[0]['messagePhoto'],
            'messageDate' => $messages[0]['messageDate'],
            'nextMessageExists' => $nextPhotoExists,
            'prevMessageExists' => $prevPhotoExists
        );
        $this->parser->parse('resident_message', $data);
    }
    
    //for family to send messages, not fully functional
    public function sendMessage(){
        $this->checkIfLoggedIn();
        $data = $this->Language_model->getSendMessageLanguage();
        $data['name']=$this->session->userdata('name');
         $this->load->model('Residentpage_model');
        $data['residents'] = $this->Residentpage_model->getAllResidents();
       $this->parser->parse('sendMessage', $data);
        
         
       
    }
    
    public function checkIfLoggedIn() {       
        if($this->session->logged_in != 'resident' && $this->session->logged_in != 'family') {
            redirect('ResidentController/login');
        }
    }
    
}
