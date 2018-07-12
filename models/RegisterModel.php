<?php

class RegisterModel
{

    public $dbname = null;

    public function __construct($dbname)
    {
        $this->model = $dbname;
    }

    public function isUser($login)
    {
        $sth = $this->db->prepare("SELECT id FROM user WHERE login=?");
        $sth->bindValue(1, $login, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    

}