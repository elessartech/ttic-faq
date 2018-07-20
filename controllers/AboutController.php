<?php

class AboutController 
{

    public function __construct($db, $Twig)
    {
        include 'models/AboutModel.php';
        $this->model = new AboutModel($db);
        $this->twig = $Twig;
    }

    public function AboutAction()
    {
        $template = $this->twig->loadTemplate('about.php');
		echo $template->render( [] );
    }
}