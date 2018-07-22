<?php
 
class SettingsController
{

    public function __construct($db, $Twig)
    {
        include 'models/UsersModel.php';
        $this->model = new UsersModel($db);
        $this->twig = $Twig;
    }

    public function SettingsAction()
    {
        $user = $_SESSION['user'];
        $user_info = $this->model->getUser($user);
        $template = $this->twig->loadTemplate('userMode/settings.php');
		echo $template->render( ['session_user'=>$user, 'user_info'=>$user_info] );
    }

    public function SettingsChangeUsername()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['changeusername']))
            {
                if (isset($_POST['login']) && isset($_POST['id'])) 
                {
                    $login = trim(strip_tags($_POST['login']));
                    $id = $_POST['id'];
                    $this->model->changeUsername($id, $login);
                    $_SESSION['user'] = $login;
                    echo("<script>location.href = '?/settings';</script>");
                }
            }
        }   
    }

    public function SettingsChangeEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['changeemail']))
            {
                if (isset($_POST['email']) && isset($_POST['id'])) 
                {
                    $email = trim(strip_tags($_POST['email']));
                    $id = $_POST['id'];
                    $this->model->changeEmail($id, $email);
                    echo("<script>location.href = '?/settings';</script>");
                }
            }
        }   
    }

    public function SettingsChangePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['changepassword']))
            {
                if (isset($_POST['id']) && isset($_POST['old_pass']) && isset($_POST['new_pass']) && isset($_POST['confirm_pass'])) 
                {
                    $id = $_POST['id'];
                    $old_pass = md5(trim(strip_tags($_POST['old_pass'])));
                    $new_pass = md5(trim(strip_tags($_POST['new_pass'])));
                    $confirm_pass = md5(trim(strip_tags($_POST['confirm_pass'])));
                    if ($confirm_pass == $new_pass)
                    {
                        $this->model->changePassword($id, $old_pass, $new_pass);
                        echo("<script>location.href = '?/settings';</script>");
                    }
                }
            }
        }
    }
}