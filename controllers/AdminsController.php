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
        $template = $this->twig->loadTemplate('admins.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'admins'=>$admins] );
    }

    public function AdminsDeleteUser($id)
    {
        $this->model->deleteAdmin($id);
        echo("<script>location.href = '?/admins';</script>");
    }

    
}