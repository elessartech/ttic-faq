<?php

class AboutController 
{

    public function __construct($db, $Twig)
    {
        include 'models/UsersModel.php';
        $this->model = new UsersModel($db);
        $this->twig = $Twig;
    }

    public function AboutAction()
    {
        $template = $this->twig->loadTemplate('about.php');
		echo $template->render( ['session_admin'=>$_SESSION['admin'], 'session_user'=>$_SESSION['user']] );
    }
}