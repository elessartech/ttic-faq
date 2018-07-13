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
                <li><i class="fa fa-question-circle"></i><a href="?/panel">Questions</a></li>
                <li><i class="fa fa-user"></i><a href="?/admins">Admins</a></li>
                <li><i class="fa fa-users"></i><a href="?/users">Users</a></li>
                <li><i class="fa fa-list-ol"></i><a style="padding-left: 5px;" href="?/categories">Categories</a></li>
                <li><i class="fa fa-sign-out"></i><a href="?/login/logout">Log Out</a></li>
            </ul>  
        </div>
        <div class="panel_dashboard">
            <table>
                <thead class="panel_dashboard_categories">
                <tr>
                        <td>Question</td>
                        <td>Author and date</td>
                        <td>Category</td>
                        <td>Status</td>
                        <td>Operations</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for question in questions %}
                <tr>
                    <td>{{ question.question }}</td>
                    <td><p>{{ question.author }} ({{ question.email }})</p><p>{{ question.date_added }}</p></td>
                    <td>
                        <p>{{ question.category }}</p>
                        <form action="?/panel/changeCategory" method="POST" class="panel_dashboard_form">
                            <input type="hidden" name="id" value="{{question.id}}" />
                            <select name="category_id" class="panel_dashboard_select">
                                {% for category in categories %}
                                <option value="{{ category.id }}">{{ category.category }}</option>
                                {% endfor %}
                            </select>
                            <button type="submit" name="change" value="change" class="panel_dashboard_select_sub"><i class="fa fa-check"></i></button>
                        </form>
                    </td>
                    <td class="panel_status">
                    {% if question.answer is null and question.visibility is null %}
                        <p>Waiting for response</p>
                        <p>(not publicated)</p>
                    {% endif %}
                    {% if question.answer and question.visibility is null %}
                        <p>Not publicated</p>
                        <p>(response given)</p>
                    {% endif %}
                    {% if question.answer and question.visibility %}
                        <p>Publicated</p>
                        <p>(response given)</p>
                    {% endif %}
                    </td>
                    <td class="panel_actions">
                        <p><i class="fa fa-trash"></i><a href="?/panel/deleteQuestion/{{question.id}}" class='panel_actions_del'> Delete</a></p>
                        <p><i class="fa fa-pencil"></i><a href="?/editQuestion/{{ question.id }}"> Edit</a></p>
                        <p><i class="fa fa-unlink"></i><a href="?/panel/takeoffQuestion/{{ question.id }}"> Take off publication</a></p>
                    </td>
                </tr>
                {% endfor %}
                </tbody>
        </div>
</body>
</html>