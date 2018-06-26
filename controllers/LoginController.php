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
        $errors = 'Enter your login and password or register: ';
		$template = $this->twig->loadTemplate('login.php');
		echo $template->render(['errors'=>$errors]);
    }




}