<?php

class UsersModel
{

    public $dbname = null;

    public function __construct($dbname)
    {
        $this->db = $dbname;
    }

    public function getUsers()
    {
        $query = "SELECT id, email, login, password FROM users";
		$sth = $this->db->prepare($query); 
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getPassword($id)
    {
        $query = "SELECT password FROM users WHERE id=?";
        $sth = $this->db->prepare($query); 
        $sth->bindValue(1, $id, PDO::PARAM_INT);
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id=?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    public function makeAdmin($email, $login, $id)
    {
        $password = $this->getPassword($id);
        $pass = $password[0]['password'];
        $query = "INSERT INTO admins (email, login, password) VALUES (?, ?, ?); DELETE FROM users WHERE id=?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $email, PDO::PARAM_STR);
        $sth->bindValue(2, $login, PDO::PARAM_STR);
        $sth->bindValue(3, $pass, PDO::PARAM_STR);
        $sth->bindValue(4, $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}