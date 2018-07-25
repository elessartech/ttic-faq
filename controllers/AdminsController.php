<?php

class AdminsController
{

    public function __construct($db, $Twig)
    {
        include 'models/AdminsModel.php';
        $this->model = new AdminsModel($db);
        $this->twig = $Twig;
    }

    public function AdminsAction()
    {
        $admins = $this->model->getAdmins();
        $template = $this->twig->loadTemplate('adminMode/admins.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], 'admins'=>$admins] );
    }

    public function AdminsDeleteUser($id)
    {
        $this->model->deleteAdmin($id);
        echo("<script>location.href = '?/admins';</script>");
    }

    public function AdminsMakeUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['makeuser']))
            {
                if (isset($_POST['login']) && isset($_POST['id']) && isset($_POST['email'])) 
                {
                    $email = trim(strip_tags($_POST['email']));
                    $login = trim(strip_tags($_POST['login']));
                    $id = $_POST['id'];
                    $this->model->makeUser($email, $login, $id);
                    echo("<script>location.href = '?/admins';</script>");
                }
            }
        }   
    }

    public function AdminsChangePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if (isset($_POST['changepassword']))
            {
                if (isset($_POST['id']) && !empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass'])) 
                {
                    $id = $_POST['id'];
                    $old_pass = md5(trim(strip_tags($_POST['old_pass'])));
                    $new_pass = md5(trim(strip_tags($_POST['new_pass'])));
                    $confirm_pass = md5(trim(strip_tags($_POST['confirm_pass'])));
                    if ($confirm_pass == $new_pass)
                    {
                        $this->model->changePassword($id, $old_pass, $new_pass);
                        echo("<script>location.href = '?/admins';</script>");
                    }
                    else 
                    {
                        echo("
                            <script>
                                var errorTag = document.querySelector('.error_message');
                                errorTag.innerHTML = 'Passwords do not match.'; 
                            </script>
                        ");
                    }
                }
                else 
                {
                    echo("
                        <script>
                            var errorTag = document.querySelector('.error_message');
                            errorTag.innerHTML = 'Please, fill all inputs properly.'; 
                        </script>
                    ");
                }
            }
        }   
    }
}