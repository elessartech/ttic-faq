﻿<?php

class IndexController 
{

	public $model = null;
	public function __construct($db, $twig)
	{
		include_once 'models/IndexModel.php';
		$this->model = new IndexModel($db);
		$this->twig = $twig;
	}

	public function indexAction() 
	{
		$categories = $this->model->getCategories();
		foreach ($categories as $category) {
			$array[$category['category']]=$this->model->getQuestionsByCat($category['category']);
		}
		if (isset($_POST['insertQuestion']) && (empty($_POST['question']) || empty($_POST['author']) || empty($_POST['email']) || empty($_POST['category_id']))) {
			$alert = 'Не все поля введены';
		} else {
			$alert = 'Заполните форму, что бы задать вопрос';
		}
		$template = $this->twig->loadTemplate('index.php');
		echo $template->render([]);
	}

	public function actionAdd() 
	{
		if (isset($_POST['insertQuestion'])) {
			if (!empty($_POST['question']) && !empty($_POST['author']) && !empty($_POST['email']) && !empty($_POST['category_id'])) {
				$question = trim(strip_tags($_POST['question']));
				$author = trim(strip_tags($_POST['author']));
				$email = trim(strip_tags($_POST['email']));
				$category_id = $_POST['category_id'];
				$findStopWords = $this->model->findStopWord($question);
				if (!empty($findStopWords)) {
					$this->model->addBlockedQuestion($question, $author, $email, $category_id);
				} else {
					$this->model->addQuestion($question, $author, $email, $category_id);
				}
				header("Location: /main");
			}
		}
	}

}
?>