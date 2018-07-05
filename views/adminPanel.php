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
        <h1 class="main_title"><a href="/faq-service/">PHP FAQ</a></h1>
    </div>
    </header>
    <div class="panel_container">
        <div class="panel_menu">
            <ul>
                <li>Welcome {{   session_user  }}!</li>
                <li><i class="fa fa-question-circle"></i><a href="">Questions</a></li>
                <li><i class="fa fa-user"></i><a href="">Admins</a></li>
                <li><i class="fa fa-list-ol"></i><a href="">Categories</a></li>
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
                        <p>sql и database</p>
                        <form action="/adminPanel/change-category" method="POST" class="panel_dashboard_form">
                            <select name="category_id" class="panel_dashboard_select">
                                <option value="1">Layout</option>
                                <option value="2">Javascript</option>
                                <option value="8">Workflow</option>
                                <option value="9">sql и database</option>
                                <option value="10">back-end</option>
                                <option value="11">Other Stuff</option>
                            </select>
                            <button type="submit" name="change" value="change" class="panel_dashboard_select_sub"><i class="fa fa-check"></i></button>
                        </form>
                    </td>
                    <td class="panel_status">
                        <p>Deployed</p>
                        <p>(response given)</p>
                    </td>
                    <td class="panel_actions">
                        <p><i class="fa fa-trash"></i><a href="" class='panel_actions_del'> Delete</a></p>
                        <p><i class="fa fa-pencil"></i><a href=""> Edit</a></p>
                        <p><i class="fa fa-unlink"></i><a href=""> Take off publication</a></p>
                            
                    </td>
                </tr>
                {% endfor %}
                </tbody>
        </div>
</body>
</html>