<?php

class Event_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {
        $query = $this->db->query("select * from Caregiver where username=".$this->db->escape($username)."");
        $result = $query->result();
        if ($result != NULL) {
            if (password_verify($password, $result[0]->password))
                return $result;
            else
                return NULL;
        } else
            return NULL;
    }

    public function insertCaregiver($firstName, $lastName, $email, $password) {
        $data = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->insert('Caregiver', $data);
    }

    public function scan($scanResult) {
        $query = $this->db->query("select * from Resident where idResident='$scanResult'");
        return $query->result();
    }

    public function loginResident($qrCode) {
        $query = $this->db->query("SELECT * FROM Resident WHERE QRlogin = '$qrCode'");
        return $query->result();
    }

    public function getPersonalInformation() {
        $idCaregiver = $this->session->userdata('idCaregiver');
        $query = $this->db->query("SELECT * FROM Caregiver WHERE  idCaregiver= '$idCaregiver'");

        return $query->result_array();
    }
    
    public function getResidentInformation(){
    //    $count=$this->db->from("Resident")->count_all_results();
    
    //    $query = $this->db->query('SELECT * FROM Resident');
    //    $count = $query->num_rows();
        $last_row=$this->db->select('idResident')->order_by('idResident',"desc")->limit(1)->get('Resident')->row();
        $query = $this->db->query("SELECT * FROM Resident WHERE  idResident= '$last_row->idResident'");
        return $query->result_array();
    }

    public function changePersonalInformation($language, $email, $firstName, $lastName) {
        $idCaregiver = $this->session->userdata('idCaregiver');

        $data = array(
            'lang' => $language,
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
        );

        $this->db->where('idCaregiver', $idCaregiver);
        $this->db->update('Caregiver', $data);
        if($language == 'english') {
            $this->session->set_userdata('questionLang', 'qEnglish');
            $this->session->set_userdata('topicLang', 'topicEnglish');
        }
        if($language == 'dutch') {
            $this->session->set_userdata('questionLang', 'qDutch');
            $this->session->set_userdata('topicLang', 'topicDutch');
        }
    }

    public function changePersonalPhoto() {
        $idCaregiver = $this->session->userdata('idCaregiver');
        $nameOfPhoto= $idCaregiver;
        $original_photoPath = 'http://a17-webapps04.studev.groept.be/upload/';
        $photo = $original_photoPath . $nameOfPhoto;

        $data = array(
            'photo' => $photo,
        );

        $this->db->where('idCaregiver', $idCaregiver);
        $this->db->update('Caregiver', $data);
    }
    
    public function changeResidentPhoto() {
        
        $last_row=$this->db->select('idResident')->order_by('idResident',"desc")->limit(1)->get('Resident')->row();
        $nameOfPhoto= $last_row->idResident;
        $original_photoPath = 'http://a17-webapps04.studev.groept.be/upload/';
        $photo =$original_photoPath . $nameOfPhoto;
       
        /*$id = $this->session->userdata('idResident');
        //$original_photoPath = 'http://a17-webapps04.studev.groept.be/upload/';
        $photo =$nameOfPhoto;
        */
        $data = array(
            'photo' => $photo,
        );

        $this->db->where('idResident', $last_row->idResident);
        $this->db->update('Resident', $data);
    }
    
    public function changePassword($password) {
        $idCaregiver = $this->session->userdata('idCaregiver');

        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->where('idCaregiver', $idCaregiver);
        $this->db->update('Caregiver', $data);
    }
    
     public function insertMessage($nameOfPhoto,$receivers,$textarea)
    {
         $idCaregiver = $this->session->userdata('idCaregiver');
        $original_photoPath = 'http://a17-webapps04.studev.groept.be/upload/';
        $photo = $original_photoPath . $nameOfPhoto;
        $now=date('Y-m-d');
            
            for($i=0;$i<count($receivers);$i++)
            {
                  $data = array(
            'idSender' => $idCaregiver,
            'idReceiver' => $receivers[$i],
            'messageText' => $textarea,
            'messageDate' => $now,
            'messagePhoto' =>$photo
            
        );

        $this->db->insert('Messages', $data);
               
                
            }
    }

}
