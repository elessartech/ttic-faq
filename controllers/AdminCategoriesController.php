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

    public function AdminCategoriesAddCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (isset($_POST['new_category']))
            {
                $category = trim(strip_tags($_POST['new_category']));
                $this->model->createCategory($category);
                echo("<script>location.href = '?/adminCategories';</script>");
            }
        }
    }

    public function AdminCategoriesDeleteCategory($id)
    {
        $this->model->deleteCategory($id);
        echo("<script>location.href = '?/adminCategories';</script>");
    }

    public function AdminCategoriesChangeTitle()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (isset($_POST['id']) && isset($_POST['new_title']))
            {
                $category = trim(strip_tags($_POST['new_title']));
                $id = $_POST['id'];
                $this->model->updateCategory($id, $category);
                echo("<script>location.href = '?/adminCategories';</script>");
            }
        }
    }

}