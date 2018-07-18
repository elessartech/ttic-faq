<?php

class EditSuggestionController
{

    public function __construct($db, $Twig)
    {
        include 'models/SuggestionsModel.php';
        $this->model = new SuggestionsModel($db);
        $this->twig = $Twig;
    }

    public function EditSuggestionAction($id)
    {
        $suggestion_info = $this->model->getSuggestion($id);
        $template = $this->twig->loadTemplate('adminMode/editSuggestion.php');
        echo $template->render( ['session_admin'=>$_SESSION['admin'], 'suggestion_info'=>$suggestion_info] );
    }

    public function EditSuggestionCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (isset($_POST['update']) && isset($_POST['id']) && isset($_POST['question']) && isset($_POST['username']) && isset($_POST['suggestion']) && isset($_POST['email']) )
            {
                $id = trim(strip_tags($_POST['id']));
                $question = trim(strip_tags($_POST['question']));
                $username = trim(strip_tags($_POST['username']));
                $email = trim(strip_tags($_POST['email']));
                $suggestion = trim(strip_tags($_POST['suggestion']));


                $this->model->updateSuggestion($id, $question, $username, $email, $suggestion);
                echo("<script>location.href = '?/suggestions';</script>");
            }
        }
    }
}