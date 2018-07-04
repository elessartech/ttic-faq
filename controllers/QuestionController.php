<?php

class QuestionController 
{
    public function __construct($db, $Twig) 
    {
        include "models/QuestionModel.php";
        $this->model = new QuestionModel($db);
        $this->twig = $Twig;
    }

    public function QuestionAction() 
    {
        $categories = $this->model->getQuestionCategories();
		$template = $this->twig->loadTemplate('question.php');
		echo $template->render(['categories'=>$categories]);
    }

    public function QuestionAdd() 
	{
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['question_submit']))
            {
                if (!empty($_POST['question_author']) && !empty($_POST['question_email']) && !empty($_POST['question_category']) && !empty($_POST['question_body'])) 
                {
                    $author = trim(strip_tags($_POST['question_author']));
                    $email = trim(strip_tags($_POST['question_email']));  
                    $category = trim(strip_tags($_POST['question_category']));
                    $question = trim(strip_tags($_POST['question_body']));
                    $this->model->insertQuestion($question, $author, $email, $category);
                    header('Location:/faq-service/?/question/');
                }
            }
        }
	}
}