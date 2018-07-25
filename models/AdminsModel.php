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
        $query = "SELECT id, login, password, email FROM admins";
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

    protected function getPassword($id)
    {
        $query = "SELECT password FROM admins WHERE id=?";
        $sth = $this->db->prepare($query); 
        $sth->bindValue(1, $id, PDO::PARAM_INT);
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function changePassword($id, $old_pass, $new_pass)
    {
        $password = $this->getPassword($id);
        $user_pass = $password[0]['password'];
        $query = "UPDATE admins SET password = ? WHERE id = ?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $new_pass, PDO::PARAM_STR);
        $sth->bindValue(2, $id, PDO::PARAM_INT);
        if ($user_pass == $old_pass)
        {
            return $sth->execute(); 
        }
        else 
        {
            return false;
        }
    }

    public function makeUser($email, $login, $id)
    {
        $password = $this->getPassword($id);
        $pass = $password[0]['password'];
        $query = "INSERT INTO users (email, login, password) VALUES (?, ?, ?); DELETE FROM admins WHERE id=?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $email, PDO::PARAM_STR);
        $sth->bindValue(2, $login, PDO::PARAM_STR);
        $sth->bindValue(3, $pass, PDO::PARAM_STR);
        $sth->bindValue(4, $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}