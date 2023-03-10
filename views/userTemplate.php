<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {% block title %}
	{% endblock %}

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/">TTIC FAQ</a></h1>
    </div>
    </header>
    <div class="panel_container">
        <div class="panel_menu">
            <ul>
            {% if session_user %}
                <li>Welcome {{   session_user  }}!</li>
            {% endif %}
                <li><i class="fa fa-question-circle"></i><a href="?/panel">Questions</a></li>
                <li><i class="fa fa-bullhorn"></i><a style="padding-left: 5px;" href="?/askQuestion">Ask a Question</a></li>
                <li><i class="fa fa-cogs"></i><a href="?/settings">Settings</a></li>
                <li><i class="fa fa-sign-out"></i><a href="?/login/logout">Log Out</a></li>
            </ul>  
        </div>
        <div class="panel_dashboard">
        {% block child %}
		{% endblock %}
        </div>
<script src="public/js/lib/jquery-2.1.1.js"></script>
<script src="public/js/error_message.js"></script> <!-- Resource jQuery -->
</body>
</html>