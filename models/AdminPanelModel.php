<?php


class AdminPanelModel
{

    public $db = null;

    public function __construct($db) 
    {
        $this->db = $db;
    }

    public function getQuestions() 
	{
		$query = "SELECT id, question, author, email, date_added FROM questions";
		$sth = $this->db->prepare($query); 
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}