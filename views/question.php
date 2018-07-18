<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ask a Question</title>

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
            </ul>
        </nav>
    </div>
    </header>
    <div class="question">
            <h2 class="question-header">Ask a Question</h2>
            <form action='?/question/add' method="POST" class="question-container">
                <p><input type="text" placeholder="Username" name="question_author"/></p>
                <p><input type="email" placeholder="Email" name="question_email"/></p>
                <p><select name="question_category">
                    <option disabled="disabled" selected="selected">Choose category...</option>
                    {% for category in categories %}
                        <option value="{{ category.id }}">{{ category.category }}</option>
                    {% endfor %}
                </select></p>
                <p><input type="text" placeholder="Question" name="question_body"/></p>
                <p><input type="submit" value="Submit" name="question_submit" /></p>
            </form>
    </div>
    <section class="prefooter_section">
	<div class="prefooter_header_section">
		<h3>Keep in touch with us</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque</p>
		<input type="text" placeholder="Enter your email">
		<input type="submit" value="Submit">
		<div class="prefooter_icons">
            <a href="https://github.com/IlmastMaksim"><i class="fa fa-github"></i></a>
			<a href="https://www.facebook.com/profile.php?id=100014949219835"><i class="fa fa-facebook"></i></a>
			<a href="https://www.linkedin.com/in/maksim-ilmast-8ba669151/"><i class="fa fa-linkedin"></i></a>
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
		</ul>
	</div>
</section>
</body>
</html>