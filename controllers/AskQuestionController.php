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
        $template = $this->twig->loadTemplate('userMode/askQuestion.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], "questions"=>$questions, "categories"=>$categories] );
    } 

}