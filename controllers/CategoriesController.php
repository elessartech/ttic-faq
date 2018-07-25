<?php

class CategoriesController
{

    public function __construct($db, $Twig)
    {
        include 'models/CategoriesModel.php';
        $this->model = new CategoriesModel($db);
        $this->twig = $Twig;
    }

    public function CategoriesAction()
    {
        $categories = $this->model->getQuestionCategories();
        $template = $this->twig->loadTemplate('adminMode/categories.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], 'categories'=>$categories] );
    }

    public function CategoriesAddCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (!empty($_POST['new_category']))
            {
                $category = trim(strip_tags($_POST['new_category']));
                $this->model->createCategory($category);
                echo("<script>location.href = '?/categories';</script>");
            }
            else 
            {
                echo("
                    <script>
                        var errorTag = document.querySelector('.error_message');
                        errorTag.innerHTML = 'Please, fill the input properly.'; 
                    </script>
                ");
            }
        }
    }

    public function CategoriesDeleteCategory($id)
    {
        $this->model->deleteCategory($id);
        echo("<script>location.href = '?/categories';</script>");
    }

    public function CategoriesChangeTitle()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (isset($_POST['id']) && isset($_POST['new_title']))
            {
                $category = trim(strip_tags($_POST['new_title']));
                $id = $_POST['id'];
                $this->model->updateCategory($id, $category);
                echo("<script>location.href = '?/categories';</script>");
            }
        }
    }

}