<?php


class PanelModel
{

    public $db = null;

    public function __construct($db) 
    {
        $this->db = $db;
    }

    public function getQuestionsAndCategories() 
    {
        $query = "SELECT questions.id, questions.question, questions.author,
        questions.email, questions.answer, questions.category_id,
        questions.visibility, questions.date_added, categories.category 
        FROM questions INNER JOIN categories ON questions.category_id = categories.id
        WHERE questions.blocked = 0";
        $sth = $this->db->prepare($query);
        $sth->execute(); 
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCategories() 
    {
        $query = "SELECT id, category FROM categories";
        $sth = $this->db->prepare($query);
        $sth->execute();
        return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function deleteQuestion($id)
    {
        $query = "DELETE FROM questions WHERE id=?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    public function takeoffPublication($id)
    {
        $query = "UPDATE questions SET visibility = NULL WHERE id = ?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $id, PDO::PARAM_STR);
        return $sth->execute();    
    }

    public function updateCategory($id, $category_id)
    {
        $query = "UPDATE questions SET category_id = ? WHERE id = ?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $category_id, PDO::PARAM_STR);
        $sth->bindValue(2, $id, PDO::PARAM_INT);
        return $sth->execute();  
    }

}