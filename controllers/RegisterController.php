<?php

class RegisterController
{

    public function __construct($db, $Twig)
    {
        include 'models/RegisterModel.php';
        $this->model = $db;
        $this->twig = $Twig;
    }

    public function RegisterAction()
    {
        $template = $this->twig->loadTemplate('register.php');
		echo $template->render( [] );
    }

    public function ResgisterCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')   
        {
            if (isset($_POST['sign_in']))
            {
                if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass_2']))
                {
                    if ($_POST['pass'] == $_POST['pass_2']) 
                    {
                        $login = trim(strip_tags($_POST['login']));
                        $pass = md5(trim(strip_tags($_POST['pass'])));
                        if ($this->model->isUser($login))
                        {
                            $_SESSION['user'] = $login;
                            header("Location:/faq-service/?/adminPanel");
                        }
                        else 
                        {
                            header("Location:/login/?error=wrong");
                        }
                    }
                }   
            }
        }
    }

}