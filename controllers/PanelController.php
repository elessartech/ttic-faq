<?php

class PanelController 
{

    public $model = null;

    public function __construct($db, $Twig) 
    {
        include_once 'models/PanelModel.php';
        $this->model = new PanelModel($db);
        $this->twig = $Twig;
    }


    public function PanelAction()
    {
        $categories = $this->model->getCategories();
        $questions = $this->model->getQuestionsAndCategories();
        if (isset($_SESSION['admin']))
        {
            $template = $this->twig->loadTemplate('adminMode/panel.php');
        }
        else
        {
            $template = $this->twig->loadTemplate('userMode/panel.php');
        }
		echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], "questions"=>$questions, "categories"=>$categories] );
    }

    public function PanelDeleteQuestion($id)
    {
        $this->model->deleteQuestion($id);
        echo("<script>location.href = '?/panel';</script>");
    }

    public function PanelTakeoffQuestion($id)
    {
        $this->model->takeoffPublication($id);
        echo("<script>location.href = '?/panel';</script>");
    }

    public function PanelChangeCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (isset($_POST['change']) && isset($_POST['category_id']) && isset($_POST['id']))
            {
                $id = $_POST['id'];
                $category = trim(strip_tags($_POST['category_id']));
                $this->model->updateCategory($id, $category);
                echo("<script>location.href = '?/panel';</script>");
            }
        }
    }

}

?>