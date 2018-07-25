<?php



class IndexController 
{
	public function __construct($db, $twig)
	{
		include_once 'models/CategoriesModel.php';
		$this->model = new CategoriesModel($db);
		$this->twig = $twig;
	}

	public function IndexAction() 
	{
		$categories = $this->model->getQuestionCategories();
		foreach ($categories as $category)
		{
			$array[$category['category']]=$this->model->getQuestionsByCat($category['category']);
		}
		$template = $this->twig->loadTemplate('index.php');
		echo $template->render(['questions'=>$array, 'categories'=>$categories, 'session_user'=>$_SESSION['user'], 'session_admin'=>$_SESSION['admin']]);
	}



}
?>