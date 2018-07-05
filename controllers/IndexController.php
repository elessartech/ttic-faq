<?php

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
		foreach ($categories as $category)
		{
			$array[$category['category']]=$this->model->getQuestionsByCat($category['category']);
		}
		$template = $this->twig->loadTemplate('index.php');
		echo $template->render(['questions'=>$array, 'categories'=>$categories, 'session_user'=>$_SESSION['user']]);
	}


}
?>