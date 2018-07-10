<?php

class AdminCategoriesController
{

    public function __construct($db, $Twig)
    {
        include 'models/AdminCategoriesModel.php';
        $this->model = new AdminCategoriesModel($db);
        $this->twig = $Twig;
    }

    public function AdminCategoriesAction()
    {
        $categories = $this->model->getQuestionCategories();
        $template = $this->twig->loadTemplate('adminCategories.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'categories'=>$categories] );
    }

}