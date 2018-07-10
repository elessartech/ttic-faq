<?php


class AdminAdminsModel
{

    public $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAdmins()
    {
        $query = "SELECT id, login, password FROM admins";
		$sth = $this->db->prepare($query); 
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}