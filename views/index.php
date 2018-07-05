<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->
	<script src="public/js/lib/modernizr.js"></script> <!-- Modernizr -->

	
	<title>Main</title>
</head>
<body>
<header>
<div class="main_block_nav_container">
	<h1 class="main_title"><a href="/">PHP FAQ</a></h1>
	<nav>
		<ul class="main_menu">
			{% if session_user %}
				<li><a href="?/adminPanel">You logged in as {{session_user}}</a></li>
			{% else %}
				<li><a href="?/question">Ask a Question</a></li>
				<li><a href="?/login">Log In</a></li>
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

<script src="public/js/lib/jquery-2.1.1.js"></script>
<script src="public/js/app.js"></script> <!-- Resource jQuery -->
</body>
</html>