<?php
class Message_model extends CI_Model {

    public function getAllMessages($idResident){
        return $this->db->query(
            "SELECT Messages.*, Users.firstName, Users.photo
            FROM Messages
            LEFT JOIN(
                SELECT 
                idCaregiver as id,
                firstName,
                lastName,
                photo
                FROM Caregiver
                UNION SELECT
                idFamily as id,
                firstName,
                lastName,
                photo
                FROM Family
            ) AS Users
            ON Messages.idSender=Users.id
            WHERE Messages.idReceiver = '$idResident'
            ORDER BY Messages.messageDate"
        )->result_array();
    }
    
    public function sendMessage($idSender, $idReceiver, $messageText, $messagePhoto){
        date_default_timezone_set("Europe/Brussels");
        $data = array(
            "idMessage" => "",
            "idSender" => $idSender,
            "idReceiver" => $idReceiver,
            "messageText" => $messageText,
            "messagePhoto" => $messagePhoto,
            "messageDate" => date("Y-m-d")
        );
        $this->db->insert('Messages', $data);
    }
    
    public function getFamilyAcquaintances($idFamily){
        return $this->db->query(
            "SELECT Residents.* 
            FROM 'Residents'
            INNER JOIN 'Family_knows_Residents' as 'FkR'
            ON 'FkR'.'idResident' = 'Residents'.'idResident'
            WHERE 'FkR'.'idFamily' = ".$this->db->escape($idFamily).""
        )->result_array();
    }
}
