<?php


class AdminPanelModel
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





    





    
    /*    public function getQuestions() 
        {
            $query = "SELECT id, question, author, email, date_added FROM questions";
            $sth = $this->db->prepare($query); 
            $sth->execute(); 
            return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        }*/
}