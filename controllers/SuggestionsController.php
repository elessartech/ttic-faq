<?php 

class SuggestionsController
{

    public function __construct($db, $Twig)
    {
        include 'models/SuggestionsModel.php';
        $this->model = new SuggestionsModel($db);
        $this->twig = $Twig;
    }

    public function SuggestionsAction()
    {
        $suggestions = $this->model->getSuggestions();
        $template = $this->twig->loadTemplate('adminMode/suggestions.php');
		echo $template->render( ['session_admin'=>$_SESSION['admin'], 'suggestions'=>$suggestions] );
    }

    public function SuggestionsDeleteSuggestion($id)
    {
        $this->model->deleteSuggestion($id);
        echo("<script>location.href = '?/suggestions';</script>");
    }

    public function SuggestionsPublicateSuggestion($id)
    {
        $this->model->publicateSuggestion($id);
        echo("<script>location.href = '?/suggestions';</script>");
    }


}