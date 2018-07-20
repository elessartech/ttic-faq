<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->
	<script src="public/js/lib/modernizr.js"></script> <!-- Modernizr -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
	
	<title>Main</title>
</head>
<body>
<header>
<div class="main_block_nav_container">
	<h1 class="main_title"><a href="/faq-service">TTIC FAQ</a></h1>
	<nav>
		<ul class="main_menu">
			{% if session_admin %}
			<li><a href="?/panel"> <i style="color: #fff; margin-right: 7px;" class="fa fa-user"></i>Admin Panel</a></li>
			<li><a href="?/login/logout"> <i style="color: #fff; margin-right: 7px;" class="fa fa-sign-out"></i>Log Out</a></li>
			{% elseif session_user %}
			<li><a href="?/panel"><i style="color: #fff; margin-right: 7px;" class="fa fa-user"></i>User Panel</a></li>
			<li><a href="?/login/logout"> <i style="color: #fff; margin-right: 7px;" class="fa fa-sign-out"></i>Log Out</a></li>
			{% else %}
			<li><a href="/faq-service/">Home</a></li>
            <li><a href="?/about">About</a></li>
			<li><a href="?/login">Log In</a></li>
			<li><a href="#contact">Contact</a></li>
			{% endif %}
		</ul>
	</nav>
</div>
</header>

<section class="cd-faq">
		<ul class="cd-faq-categories">
		{% for category in categories %}
			<li><a href="#{{category.category}}">{{category.category}}</a></li>
		{% endfor %}
		</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
	{% for key,value in questions %}
		<ul id="{{key}}" class="cd-faq-group">
			<li class="cd-faq-title"><h2>{{key}}</h2></li>
			{% for question in value %}
			<li>
				<a class="cd-faq-trigger" href="#0">{{question.question}}</a>
				<div class="cd-faq-content">			
					<p>{{question.answer}}</p>
				</div> <!-- cd-faq-content -->
			</li>
			{% endfor %}
		</ul> <!-- cd-faq-group -->
	{% endfor %}
	</div>
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->

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
			<li><a href="/faq-service/">Home</a></li>
            <li><a href="?/about">About</a></li>
			<li><a href="?/login">Log In</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</div>
</section>

<script src="public/js/lib/jquery-2.1.1.js"></script>
<script src="public/js/app.js"></script> <!-- Resource jQuery -->
<script src="public/js/scroll.js"></script> <!-- Resource jQuery -->
</body>
</html>