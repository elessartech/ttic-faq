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
		echo $template->render( [] );
    }

    public function LoginCheck() 
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST')   
        {
            if (isset($_POST['sign_in']))
            {
                if (!empty($_POST['login']) && !empty($_POST['pass']))
                {
                    $login = trim(strip_tags($_POST['login']));
                    $pass = md5(trim(strip_tags($_POST['pass'])));
                    if ($this->model->findUser($login, $pass))
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

    public function LoginLogout() 
    {
        session_destroy();
    }


}