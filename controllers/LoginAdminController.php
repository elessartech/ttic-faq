<?php 

class LoginAdminController
{

    public function __construct($db, $Twig)
    {
        include 'models/LoginModel.php';
        $this->model = new LoginModel($db);
        $this->twig = $Twig;
    }

    public function LoginAdminAction()
    {
        $template = $this->twig->loadTemplate('loginAdmin.php');
		echo $template->render([]);
    }

    public function LoginAdminCheck() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')   
        {
            if (isset($_POST['sign_in']))
            {
                if (!empty($_POST['login']) && !empty($_POST['pass']))
                {
                    $login = trim(strip_tags($_POST['login']));
                    $pass = md5(trim(strip_tags($_POST['pass'])));
                    if ($this->model->findAdmin($login, $pass))
                    {
                        $_SESSION['admin'] = $login;
                        header("Location:/faq-service/?/panel");
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