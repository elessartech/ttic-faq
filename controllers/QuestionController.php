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
		$template = $this->twig->loadTemplate('question.php');
		echo $template->render([]);
    }
}