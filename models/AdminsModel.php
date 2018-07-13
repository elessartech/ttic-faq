<?php


class AdminsModel
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

    public function deleteAdmin($id)
    {
        $query = "DELETE FROM admins WHERE id=?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}