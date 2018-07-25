<?php

class RegisterController
{

    public function __construct($db, $Twig)
    {
        include 'models/LoginModel.php';
        $this->model = new LoginModel($db);
        $this->twig = $Twig;
    }

    public function RegisterAction()
    {
        $template = $this->twig->loadTemplate('register.php');
		echo $template->render( [] );
    }

    public function RegisterCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')   
        {
            if (isset($_POST['sign_in']))
            {
                if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass_2']))
                {
                    if ($_POST['pass'] == $_POST['pass_2']) 
                    {
                        $login = trim(strip_tags($_POST['login']));
                        $email = trim(strip_tags($_POST['email']));
                        $pass = md5(trim(strip_tags($_POST['pass'])));
                        if ($this->model->isUser($login))
                        {
                            echo("
                                <script>
                                    var errorTag = document.querySelector('.error_message');
                                    errorTag.innerHTML = 'This user alredy exists.'; 
                                </script>
                            ");
                        }
                        else 
                        {
                            $this->model->registerUser($email, $login, $pass);
                            $_SESSION['user'] = $login;
                            header("Location:/faq-service/?/panel");
                        }
                    }
                    else 
                    {
                        echo("
                            <script>
                                var errorTag = document.querySelector('.error_message');
                                errorTag.innerHTML = 'Passwords do not match.'; 
                            </script>
                        ");
                    }
                }
                else
                {
                    echo("
                        <script>
                            var errorTag = document.querySelector('.error_message');
                            errorTag.innerHTML = 'Please, fill all inputs properly.'; 
                        </script>
                    ");
                }   
            }
        }
    }

}