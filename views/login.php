<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/faq-service/">PHP FAQ</a></h1>
        <nav>
            <ul class="main_menu">
            <li><a href="?/question">Ask a Question</a></li>
			<li><a href="?/login">Log In</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <div class="login">
            <h2 class="login-header">Log in</h2>
            <form action='?/login' class="login-container">
                <p><input type="text" placeholder="Username"</p>
                <p><input type="password" placeholder="Password"</p>
                <p><input type="submit" value="Submit" /></p>
            </form>
    </div>
</body>
</html>