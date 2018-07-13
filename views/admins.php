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
                        <td>ID</td>
                        <td>Username</td>
                        <td>Delete</td>
                        <td>Change password</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for admin in admins %}
                <tr>
                    <td>{{admin.id}}</td>
                    <td><p>{{admin.login}}</p></td>
                    <td>
                    <p><a href="?/admins/deleteUser/{{admin.id}}" class="admins_delete_link"><span class="fa fa-trash"></span> Delete</a></p>
                    </td>
                    <td>
                    <form action="?/admins/change-password" method="POST">
									<input type="hidden" name="id" value="{{admin.id}}">
									<input type="hidden" name="login" value="{{admin.login}}">
									<div>
										<input type="password" name="old" placeholder="Previous Password" class="old_pass">
									</div>
									<div>
										<input type="password" name="new" placeholder="New Password" class="new_pass">
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