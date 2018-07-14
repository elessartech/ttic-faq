<?php


class EditQuestionController
{

public function __construct($db, $Twig)
{
    include 'models/QuestionModel.php';
    $this->model = new QuestionModel($db);
    $this->twig = $Twig;
}

public function EditQuestionAction($id)
{
    $question_info = $this->model->getQuestion($id);
    $template = $this->twig->loadTemplate('adminMode/editQuestion.php');
	echo $template->render( ['session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin'], 'question_info'=>$question_info] );
}

public function EditQuestionCheck()
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
                echo("<script>location.href = '?/panel';</script>");
            }
            else {
                $this->model->update($id, $question, $author, $email, $answer);
                echo("<script>location.href = '?/panel';</script>");
            }
        }
    }
}















}

























?>