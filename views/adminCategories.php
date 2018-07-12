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
        <div class="panel_dashboard">
            <form class="add_categories_container" method="POST" action="?/adminCategories/addCategory">
                <input type="text" name="new_category" placeholder="Add category" class="add_categories_input">
                <input type="submit" name="new_category_submit" value="Add" class="add_categories_submit">
            </form>
            <table>
                <thead class="panel_dashboard_categories">
                <tr>
                        <td>Title</td>
                        <td>Delete category</td>
                        <td>Rename category</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for category in categories %}
                <tr>
                    <td>{{category.category}}</td>
                    <td>
                    <p><a href="?/adminCategories/deleteCategory/{{category.id}}" class="admins_delete_link"><span class="fa fa-trash"></span> Delete</a></p>
                    </td>
                    <td>
                    <form action="?/adminCategories/changeTitle" method="POST">
									<input type="hidden" name="id" value="{{category.id}}">
									<div>
										<input type="text" name="new_title" placeholder="New category name" class="new_pass">
									</div>
									    <input type="submit" name="changepassword" value="Change" class="changepass_submit">	
								</form>
                    </td>
                </tr>
                {% endfor %}
                </tbody>
        </div>
</body>
</html>