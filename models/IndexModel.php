<?php

class IndexModel 
{

	public function __construct($dbname) 
	{
		$this->db = $dbname;
	}

	public function getQuestions() 
	{
		$query = "SELECT questions.question, questions.answer, categories.category 
		FROM questions INNER JOIN categories 
		ON questions.category_id = categories.id WHERE visibility = 1 
		ORDER BY categories.category DESC";
		$sth = $this->db->prepare($query); 
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	}


	public function getCategories() 
	{
		$query = "SELECT id, category FROM categories";
		$sth = $this->db->prepare($query); 
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getQuestionsByCat($category) 
	{
		$query = "SELECT questions.question, questions.answer, categories.category 
		FROM questions INNER JOIN categories 
		ON questions.category_id = categories.id 
		WHERE visibility = 1 and categories.category = ?";
		$sth = $this->db->prepare($query); 
		$sth->bindValue(1, $category, PDO::PARAM_STR);
		$sth->execute(); 
		return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	}


}

?>