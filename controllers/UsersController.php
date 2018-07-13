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
        $template = $this->twig->loadTemplate('users.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'users'=>$users] );
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

}