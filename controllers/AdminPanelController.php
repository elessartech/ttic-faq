<?php

class AdminPanelController 
{

    public $model = null;

    public function __construct($db, $Twig) 
    {
        include_once 'models/AdminPanelModel.php';
        $this->model = new AdminPanelModel($db);
        $this->twig = $Twig;
    }


    public function AdminPanelAction()
    {
        $template = $this->twig->loadTemplate('adminPanel.php');
		echo $template->render( ['session_user'=>$_SESSION['user']] );
    }
}