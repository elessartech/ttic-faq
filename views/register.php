<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/faq-service/">TTIC FAQ</a></h1>
        <nav>
            <ul class="main_menu">
            <li><a href="?/question">Ask a Question</a></li>
			<li><a href="?/login">Log In</a></li>
            <li><a href="?/register">Sign Up</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <div class="login">
            <h2 class="login-header">Sign up</h2>
            <form action='?/register/check' method="POST" class="login-container">
                <p><input type="text" placeholder="Username" name="login"   /></p>
                <p><input type="text" placeholder="Email" name="email"   /></p>
                <p><input type="password" placeholder="Password" name="pass"   /></p>
                <p><input type="password" placeholder="Confirm Password" name="pass_2"   /></p>
                <p><input type="submit" value="Submit" name="sign_in" /></p>
            </form>
    </div>
</body>
</html>