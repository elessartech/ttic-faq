<?php


class QuestionModel 
{

    public function __construct($dbname) 
    {
        $this->db = $dbname;
    }

    public function getQuestionCategories() 
	{
		$query = "SELECT id, category FROM categories";
		$sth = $this->db->prepare($query); 
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insertQuestion($question, $author, $email, $category_id)
    {
        $query = "INSERT INTO questions (question, date_added, author, email, category_id) VALUES (?, now(), ?, ?, ?)";
		$sth = $this->db->prepare($query); 
		$sth->bindValue(1, $question, PDO::PARAM_STR);
		$sth->bindValue(2, $author, PDO::PARAM_STR);
		$sth->bindValue(3, $email, PDO::PARAM_STR);
		$sth->bindValue(4, $category_id, PDO::PARAM_INT);
		return $sth->execute();
    }

}