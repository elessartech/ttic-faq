<?php


class AdminEditQuestionController
{

public function __construct($db, $Twig)
{
    include 'models/AdminEditQuestionModel.php';
    $this->model = new AdminEditQuestionModel($db);
    $this->twig = $Twig;
}

public function AdminEditQuestionAction($id)
{
    $question_info = $this->model->getQuestion($id);
    $template = $this->twig->loadTemplate('adminEditQuestion.php');
	echo $template->render( ['session_user'=>$_SESSION['user'], 'question_info'=>$question_info] );
}

public function AdminEditQuestionCheck()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset($_POST['update']) && isset($_POST['id']) && isset($_POST['question']) && isset($_POST['author']) && isset($_POST['answer']) && isset($_POST['email']) && isset($_POST['visibility']) )
        {
            $id = trim(strip_tags($_POST['id']));
            $question = trim(strip_tags($_POST['question']));
            $author = trim(strip_tags($_POST['author']));
            $email = trim(strip_tags($_POST['email']));
            $answer = trim(strip_tags($_POST['answer']));
            $visibility = trim(strip_tags($_POST['visibility']));
            if ($visibility ==  '1')
            {
                $this->model->updatePublic($id, $question, $author, $email, $answer);
                echo("<script>location.href = '?/adminPanel';</script>");
            }
            else {
                $this->model->update($id, $question, $author, $email, $answer);
                echo("<script>location.href = '?/adminPanel';</script>");
            }
        }
    }
}















}

























?>