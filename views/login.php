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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/faq-service/">TTIC FAQ</a></h1>
        <nav>
            <ul class="main_menu">
            <li><a href="/faq-service/">Home</a></li>
            <li><a href="?/about">About</a></li>
			<li><a href="?/login">Log In</a></li>
			<li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <div class="login">
            <div class="error_container" id='error_container'>
                    <span id="error_message"></span>
                    <button id="error_button" class="error_button"><i class="fa fa-times"></i></button>
            </div>
            <h2 class="login-header">Log in</h2>
            <form action='?/login/check' method="POST" id="loginform" class="login-container">
                <p><input type="text" id="login" placeholder="Username" name="login"   /></p>
                <p><input type="password" id="password" placeholder="Password" name="pass"   /></p>
                <p><input type="submit" value="Submit" id="submit" class='login-container-last-child' name="sign_in" /></p>
                <p class="login_as_admin">Log in as <a href="?/loginAdmin"><span>admin</span></a> or <a href="?/register"><span>register</span></a>?</p>
            </form>
    </div>
    <section class="prefooter_section" id="contact">
	<div class="prefooter_header_section">
		<h3>Keep in touch with developers</h3>
		<p>Thanks for visiting our community site! It would be really fantastic to fetch some feedback from you! Send me your email and we`ll get in touch!</p>
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
            <li><a href="/faq-service/">Home</a></li>
            <li><a href="?/about">About</a></li>
			<li><a href="?/login">Log In</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</div>
</section>
<script src="public/js/lib/jquery-2.1.1.js"></script>
<script src="public/js/scroll.js"></script> <!-- Resource jQuery -->
<script src="public/js/error_message.js"></script> <!-- Resource jQuery -->
</body>
</html>