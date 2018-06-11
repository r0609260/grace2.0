<?php

class Dashboard_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCaregiverSectors() {
        $idCaregiver = $this->session->userdata('idCaregiver'); //Get id from session to get caregivers sector id
        $sector = $this->db->query("SELECT Sectors_idSector AS sectorId FROM Caregiver_has_Sectors WHERE Caregiver_idCaregiver = '$idCaregiver'")->result_array();
        $ids = array();
        for ($x = 0; $x < count($sector); $x++)
        {
            $id = $sector[$x]['sectorId'];
            $mResult = $this->db->query("SELECT idResident FROM Resident WHERE Sectors_idSector = '$id'");
            for ($i = 0; $i < $mResult->num_rows(); $i++) {                
                $ids[] = $mResult->result_array()[$i]['idResident'];
            }
        }
        return $ids;
    }
    
    public function getAllNotificationsFromSectors($ids) {
        if(count($ids) == 0) {
            $messages = array("Geen berichten.");
            return $messages;
        }
        
        $messages = array(); //Array to store all results. Starts off empty.
        $this->db->where_in('idResident', array_values($ids));
        $this->db->order_by('priority', 'DESC');
        $mResult = $this->db->get('Notifications');
        for ($i = 0; $i < $mResult->num_rows(); $i++) {                
            $messages[] = $mResult->result_array()[$i];
        }
        return $messages;
    }
    
      public function getSectors_caregiverhas()
    {
        $idCaregiver = $this->session->userdata('idCaregiver'); //Get id from session to get caregivers sector id
        $sectorIds = $this->db->query("SELECT Sectors_idSector AS sectorId FROM Caregiver_has_Sectors WHERE Caregiver_idCaregiver = '$idCaregiver'")->result_array();
         $sectors=array();
         
          for ($x = 0; $x < count($sectorIds); $x++) {
            $id = $sectorIds[$x]['sectorId'];
            $mResult = $this->db->query("SELECT name, idSector, COUNT(idResident) AS residentCount FROM Sectors LEFT JOIN Resident ON idSector = Sectors_idSector where idSector= '$id' GROUP BY idSector ");
         
             
            $sectors[$x]=$mResult->row_array();
         
        }
        
        foreach($sectors as $key => $sector)
        {
            $sector_id=$sector['idSector'];
            $sectors[$key]['residents_sector']=$this->db->query("SELECT Sectors_idSector,idResident,firstName, lastName FROM Resident WHERE Sectors_idSector='$sector_id' ")->result_array()  ;
        }
     
        return $sectors;
    }
    
    



    
    public function getNotifications() {
        $sectorIds = Dashboard_model::getCaregiverSectors();   
        return Dashboard_model::getAllNotificationsFromSectors($sectorIds);
    }
    
    function deleteNotifications($ids) {
        foreach($ids as $id) {
            $this->db->where('idNotification', $id);
            $this->db->delete('Notifications');
        }
    }
    
    function getNotificationByPriority(){
         $query = $this->db->query("SELECT * FROM a17_webapps04.Notifications
                                   ORDER BY priority desc, idNotification desc");
        return $query->result_array();
    }
    
    function getAvgScoreSectors() {
        $ids = Dashboard_model::getCaregiverSectors();
        
        $results = array(); //Array to store all resident ids because $ids needs some parsing before it's useful
        for ($x = 0; $x < count($ids); $x++) {
            $results[] = $ids[$x];
        }
        
        $this->db->where_in('idResident',$results);
        $this->db->select_avg('avgLastScore');
        $query = $this->db->get('Resident');
        
        return $query->result_array();
    }
}

