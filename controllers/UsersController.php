<?php


class UsersController
{

    public function __construct($db, $Twig)
    {
        include 'models/UsersModel.php';
        $this->model = new UsersModel($db);
        $this->twig = $Twig;
    }

    public function UsersAction()
    {
        $users = $this->model->getUsers();
        if (isset($_SESSION['admin']))
        {
            $template = $this->twig->loadTemplate('adminMode/users.php');
        }
        else
        {
            $template = $this->twig->loadTemplate('userMode/users.php');
        }
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], 'users'=>$users] );
    }

    public function UsersDeleteUser($id)
    {
        $this->model->deleteUser($id);
        echo("<script>location.href = '?/users';</script>");
    }

    public function UsersMakeAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['makeadmin']))
            {
                if (isset($_POST['login']) && isset($_POST['id']) && isset($_POST['email'])) 
                {
                    $email = trim(strip_tags($_POST['email']));
                    $login = trim(strip_tags($_POST['login']));
                    $id = $_POST['id'];
                    $this->model->makeAdmin($email, $login, $id);
                    echo("<script>location.href = '?/users';</script>");
                }
            }
        }   
    }

    public function UsersChangePassword()
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
                        echo("<script>location.href = '?/users';</script>");
                    }
                }
            }
        }   
    }

}