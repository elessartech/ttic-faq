<?php
  
class CategoriesModel
{

    public $dbname = null;

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

	public function deleteCategory($id) 
	{
		$query = "DELETE FROM categories WHERE id = ?; DELETE FROM questions WHERE category_id = ?";
		$sth = $this->db->prepare($query);
		$sth->bindValue(1, $id, PDO::PARAM_INT);
		$sth->bindValue(2, $id, PDO::PARAM_INT);
		return $sth->execute();
	}

	public function createCategory($category) 
	{
		$query = "INSERT INTO categories (category) VALUES (?)";
		$sth = $this->db->prepare($query);
		$sth->bindValue(1, $category, PDO::PARAM_STR);
		return $sth->execute();
    }
    
	public function updateCategory($id, $category) 
	{
		$query = "UPDATE categories SET category = ? WHERE id = ?";
		$sth = $this->db->prepare($query);
		$sth->bindValue(1, $category, PDO::PARAM_STR);
		$sth->bindValue(2, $id, PDO::PARAM_INT);
		return $sth->execute();
    }
	
	public function countQuestions() 
	{
		$query = "SELECT count(question) as questions, count(answer) as answers FROM questions";
		$sth = $this->db->prepare($query);
		$sth->execute();
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>