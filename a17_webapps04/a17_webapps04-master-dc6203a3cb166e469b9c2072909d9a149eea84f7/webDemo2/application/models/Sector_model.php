<?php

class Sector_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllSectorInfos() {
        $sectors = $this->db->query("SELECT name, idSector, COUNT(idResident) AS residentCount FROM Sectors LEFT JOIN Resident ON idSector = Sectors_idSector GROUP BY idSector");
        return $sectors->result_array();
    }
    
    public function addSector($name) {
        if($name != NULL) {
            $result = $this->db->query("SELECT name FROM Sectors WHERE name LIKE ".$this->db->escape($name)."")->result();
            if($result == NULL) {
                $this->db->insert('Sectors', array('name' => $name));
                return true;
            }
            else
                return false;
        }
    }
    
    public function getSectors() {
        $sectors = $this->db->query("SELECT idSector, name from Sectors")->result();
        return $sectors;
    }
}