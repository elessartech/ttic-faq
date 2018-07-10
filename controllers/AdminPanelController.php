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
        $categories = $this->model->getCategories();
        $questions = $this->model->getQuestionsAndCategories();
        $template = $this->twig->loadTemplate('adminPanel.php');
		echo $template->render( ['session_user'=>$_SESSION['user'], "questions"=>$questions, "categories"=>$categories] );
    }

    public function AdminPanelDeleteQuestion($id)
    {
        $this->model->deleteQuestion($id);
        echo("<script>location.href = '?/adminPanel';</script>");
    }

    public function AdminPanelTakeoffQuestion($id)
    {
        $this->model->takeoffPublication($id);
        echo("<script>location.href = '?/adminPanel';</script>");
    }

    public function AdminPanelChangeCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (isset($_POST['change']) && isset($_POST['category_id']) && isset($_POST['id']))
            {
                $id = $_POST['id'];
                $category = trim(strip_tags($_POST['category_id']));
                $this->model->updateCategory($id, $category);
                echo("<script>location.href = '?/adminPanel';</script>");
            }
        }
    }

}

?>