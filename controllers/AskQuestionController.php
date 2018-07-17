<?php

class AskQuestionController
{

    public function __construct($db, $Twig)
    {
        include 'models/QuestionModel.php';
        $this->model = new QuestionModel($db);
        $this->twig = $Twig;
    }

    public function AskQuestionAction()
    {
        $categories = $this->model->getQuestionCategories();
        $template = $this->twig->loadTemplate('userMode/askQuestion.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], "questions"=>$questions, "categories"=>$categories] );
    } 

    public function AskQuestionAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['question_submit']))
            {
                if (!empty($_POST['question_author']) && !empty($_POST['question_category']) && !empty($_POST['question_body'])) 
                {
                    $author = trim(strip_tags($_POST['question_author']));
                    $email_array = $this->model->getEmailByUsername($author);  
                    $email = $email_array[0]['email'];
                    $category = trim(strip_tags($_POST['question_category']));
                    $question = trim(strip_tags($_POST['question_body']));
                    $this->model->insertQuestion($question, $author, $email, $category);
                    echo("<script>location.href = '?/panel';</script>");
                }
            }
        }
	}



}