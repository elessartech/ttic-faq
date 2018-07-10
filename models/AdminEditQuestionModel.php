<?php

class AdminEditQuestionModel
{

    public $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getQuestion($id)
    {
        $query = "SELECT id, question, author, email, answer FROM questions WHERE id=?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $question, $author, $email, $answer) 
    {
        $query = "UPDATE questions SET question = ?, author = ?, email = ?, answer = ?, visibility = NULL WHERE id = ?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $question, PDO::PARAM_STR);
        $sth->bindValue(2, $author, PDO::PARAM_STR);
        $sth->bindValue(3, $email, PDO::PARAM_STR);
        $sth->bindValue(4, $answer, PDO::PARAM_STR);
        $sth->bindValue(5, $id, PDO::PARAM_INT);
        return $sth->execute(); 
    }

    public function updatePublic($id, $question, $author, $email, $answer) 
    {
        $query = "UPDATE questions SET question = ?, author = ?, email = ?, visibility = 1, answer = ? WHERE id = ?";
        $sth = $this->db->prepare($query);
        $sth->bindValue(1, $question, PDO::PARAM_STR);
        $sth->bindValue(2, $author, PDO::PARAM_STR);
        $sth->bindValue(3, $email, PDO::PARAM_STR);
        $sth->bindValue(4, $answer, PDO::PARAM_STR);
        $sth->bindValue(5, $id, PDO::PARAM_INT);
        return $sth->execute(); 
    }


}



























?>