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

    public function AdminsChangePassword()
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
                        echo("<script>location.href = '?/admins';</script>");
                    }
                }
            }
        }   
    }
}