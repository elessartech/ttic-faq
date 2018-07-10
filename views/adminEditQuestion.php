<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/faq-service/">TTIC FAQ</a></h1>
    </div>
    </header>
    <div class="panel_container">
        <div class="panel_menu">
            <ul>
                <li>Welcome {{   session_user  }}!</li>
                <li><i class="fa fa-question-circle"></i><a href="?/adminPanel">Questions</a></li>
                <li><i class="fa fa-user"></i><a href="?/adminAdmins">Admins</a></li>
                <li><i class="fa fa-list-ol"></i><a href="?/adminCategories">Categories</a></li>
                <li><i class="fa fa-sign-out"></i><a href="?/login/logout">Log Out</a></li>
            </ul>  
        </div>
        <div class="edit_question_container">
        {% for question in question_info %}
        <form action="?/adminEditQuestion/check/{{ question.id }}" method="POST" class="">
				<input type="hidden" name="id" value="{{ question.id }}">
				<label class="edit_question_label">Question: </label>
            <div class="edit_question_input_div">
                <input type="text" name="question" value="{{ question.question }}" class="edit_question_input">
            </div>
				<label class="edit_question_label">Author: </label>
            <div class="edit_question_input_div">
                <input type="text" name="author" value="{{ question.author }}" class="edit_question_input">
            </div>
				<label class="edit_question_label">Email: </label>
            <div class="edit_question_input_div">
                <input type="text" name="email" value="{{ question.email }}" class="edit_question_input">
            </div>
				<label class="edit_question_label">Answer: </label>
            <div class="edit_question_input_div">
                <textarea rows="10" cols="45" name="answer" class="edit_question_textarea">{{ question.answer }}</textarea>
            </div><br>
				<input type="radio" name="visibility" value="1" class=""> Publicate the question  <br><br>
				<input type="radio" name="visibility" value="NULL" class=""> No publication<br><br>
				<input type="submit" name="update" value="Update" class="edit_question_submit">
			</form>
        {% endfor %}
        </div>
</body>
</html>