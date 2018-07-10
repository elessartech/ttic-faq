<?php


class AdminEditQuestionController
{

public function __construct($db, $Twig)
{
    include 'models/AdminEditQuestionModel.php';
    $this->model = new AdminEditQuestionModel($db);
    $this->twig = $Twig;
}

public function AdminEditQuestionAction()
{
    $template = $this->twig->loadTemplate('adminEditQuestion.php');
	echo $template->render( ['session_user'=>$_SESSION['user']] );
}















}

























?>