<?php
class AddResident_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkExist($firstName, $lastName, $birthDate, $gender) {
        $query = $this->db->query("SELECT * from Resident "
                . "WHERE firstName=".$this->db->escape($firstName)." "
                . "AND lastName=".$this->db->escape($lastName)." "
                . "AND birthDate=".$this->db->escape($birthDate)." "
                . "AND gender=".$this->db->escape($gender).""); //Asks for result with these parameters
        $result = $query->result();
        if ($result != NULL) return true; //When there is a result (not NULL), this resident already exists in the database.
        return false;
    }
    
    public function addInfoResident($firstName, $lastName, $birthDate, $idSector, $roomNr,$gender, $married, $children) {
                                      
        $personData = array(
            'idPerson' => 0 //value 0 makes it use its auto increment
        );
        $this->db->insert('Person', $personData);
        $personId = $this->db->insert_id();
        
        $data = array(
            'idResident' => $personId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'birthDate' => $birthDate,
            'gender' => $gender,
            'married' => $married,
            'children' => $children,
            'Sectors_idSector'=> $idSector,
            'roomNr' => $roomNr,
            
        );
        
        $this->db->insert('Resident', $data);
    }
    
    public function updateInfoResident($firstName, $lastName, $birthDate, $gender, $married, $children, $idSector,$roomNr){
        $data = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'birthDate' => $birthDate,
            'gender' => $gender,
            'married' => $married,
            'children' => $children,
            'Sectors_idSector'=> $idSector,
            'roomNr' => $roomNr            
        );
        $last_row=$this->db->select('idResident')->order_by('idResident',"desc")->limit(1)->get('Resident')->row();
        $id = $last_row->idResident;
        
        $this->db->where('idResident', $id);
        $this->db->update('Resident', $data);
    }

    public function insertCaregiver($firstName, $lastName, $email, $password) {
        $personData = array(
            'idPerson' => 0 //value 0 makes it use its auto increment
        );
        $this->db->insert('Person');
        $personId = $this->db->insert_id();
        
        $data = array(
            'idCaregiver' => $personId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->insert('caregiver', $data);
    }
    
        public function scan($scanResult) {
        $query = $this->db->query("select * from Resident where idResident=".$this->db->escape($scanResult)."");
        return $query->result();
    }

}
