<?php

class AnswerQuestionController
{

    public function __construct($db, $Twig)
    {
        include 'models/QuestionModel.php';
        $this->model = new QuestionModel($db);
        $this->twig = $Twig;
    }

    public function AnswerQuestionAction($id)
    {
        $question_info = $this->model->getQuestion($id);
        $template = $this->twig->loadTemplate('userMode/answerQuestion.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], 'question_info'=>$question_info] );
    }
    
    public function AnswerQuestionCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (isset($_POST['suggest']) && isset($_POST['id']) && isset($_POST['suggestion']) && isset($_POST['username']))
            {
                $id = $_POST['id'];
                $question_info = $this->model->getQuestion($id);
                $question = $question_info[0]['question'];
                $suggestion = trim(strip_tags($_POST['suggestion']));
                $username = trim(strip_tags($_POST['username']));
                $email_array = $this->model->getEmailByUsername($username);  
                $email = $email_array[0]['email'];
                $this->model->makeSuggestion($id, $username, $question, $suggestion, $email);
                echo("<script>location.href = '?/panel';</script>");
            }
        }
    }

}