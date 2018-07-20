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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
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
            <li><a href="#contact">Contact</a></li>
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
    <section class="prefooter_section" id="contact">
	<div class="prefooter_header_section">
		<h3>Keep in touch with developers</h3>
		<p>Thanks for visiting our community site! It would be really fantastic to fetch some feedback from you!</p>
		<div class="prefooter_icons">
			<a target="__blank" href="https://github.com/IlmastMaksim"><i class="fa fa-github"></i></a>
			<a target="__blank" href="https://www.facebook.com/profile.php?id=100014949219835"><i class="fa fa-facebook"></i></a>
			<a target="__blank" href="https://www.linkedin.com/in/maksim-ilmast-8ba669151/"><i class="fa fa-linkedin"></i></a>
		</div>
	</div>
</section>

<section class="footer_section">
	<div class="footer_container">
		<ul class="footer_author">
			<li><h4>Maksim Ilmast</h4></li>
			<li>maksim.ilmast@yandex.com</li>
			<li>+358 46 9421660</li>
		</ul>
		<ul class="footer_menu">
			<li><a href="?/question">Ask a Question</a></li>
			<li><a href="?/login">Log In</a></li>
            <li><a href="?/register">Sign Up</a></li>
            <li><a href="#contact">Contact</a></li>
		</ul>
	</div>
</section>
<script src="public/js/lib/jquery-2.1.1.js"></script>
<script src="public/js/app.js"></script> <!-- Resource jQuery -->
</body>
</html>