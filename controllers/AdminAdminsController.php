<?php

class AdminAdminsController
{

    public function __construct($db, $Twig)
    {
        include 'models/AdminAdminsModel.php';
        $this->model = new AdminAdminsModel($db);
        $this->twig = $Twig;
    }

    public function AdminAdminsAction()
    {
        $admins = $this->model->getAdmins();
        $template = $this->twig->loadTemplate('adminAdmins.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'admins'=>$admins] );
    }

    
}