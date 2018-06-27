<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../public/css/style.css"> <!-- Resource style -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/faq-service/">PHP FAQ</a></h1>
        <nav>
            <ul class="main_menu">
            <li><a href="?/question">Ask a Question</a></li>
			<li><a href="?/login">Log In</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <div class="panel_container">
        <div class="panel_menu">
            <ul>
                <li><a href="">Questions</a></li>
                <li><a href="">Admins</a></li>
                <li><a href="">Categories</a></li>
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
                <tr>
                    <td>About null-conclusions in details</td>
                    <td><p>Dick Kennedy (qweewq@gmail.com)</p><p>2018-02-09 17:41:26</p></td>
                    <td>
                        <p>sql и database</p>
                        <form action="/admin/change-category" method="POST" class="">
                            <select name="category_id" class="">
                                <option value="1">Layout</option>
                                <option value="2">Javascript</option>
                                <option value="8">Workflow</option>
                                <option value="9">sql и database</option>
                                <option value="10">back-end</option>
                                <option value="11">Other Stuff</option>
                            </select>
                            <button type="submit" name="change" value="change" class=""></button>
                        </form>
                    </td>
                    <td class="">
                        <p class="">Deployed</p>
                        <p class="">(response given)</p>
                    </td>
                    <td class="">
                        <p><a href=""><span></span> Delete</a></p>
                        <p><a href=""><span></span> Edit</a></p>
                        <p><a href=""><span></span> Take off publication</a></p>
                            
                    </td>
                </tr>
                </tbody>
        </div>
</body>
</html>