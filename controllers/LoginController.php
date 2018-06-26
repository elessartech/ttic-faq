<?php 


class LoginController 
{

    public function __construct($db, $Twig)
    {
        include 'models/LoginModel.php';
        $this->model = new LoginModel($db);
        $this->twig = $Twig;

    }

    public function LoginAction() 
    {
		$template = $this->twig->loadTemplate('login.php');
		echo $template->render([]);
    }




}