<?php 

class LoginModel
{
    public function __construct($db) 
    {
        $this->db = $db;    
    }

    public function isUser($login)
    {
        $sth = $this->db->prepare("SELECT id FROM user WHERE login=?");
        $sth->bindValue(1, $login, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findUser($login, $pass)
    {
        $sth = $this->db->prepare("SELECT id FROM user WHERE login=? and password=?");
        $sth->bindValue(1, $login, PDO::PARAM_STR);
        $sth->bindValue(2, $pass, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}