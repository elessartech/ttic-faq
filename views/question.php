<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ask a Question</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../public/css/style.css"> <!-- Resource style -->
</head>
<body>
    <header>
    <div class="main_block_nav_container">
        <h1 class="main_title"><a href="/">PHP FAQ</a></h1>
        <nav>
            <ul class="main_menu">
                <li><a href="?/question">Ask a Question</a></li>
                <li><a href="?/login">Log In</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <div class="question">
            <h2 class="question-header">Ask a Question</h2>
            <form action='' class="question-container">
                <p><input type="text" placeholder="Username"</p>
                <p><input type="email" placeholder="Email"</p>
                <p><select name="categories">
                    <option value="0">Choose category...</option>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                    <option value="4"></option>
                    <option value="5"></option>
                    <option value="6"></option>
                    <option value="7"></option>
                </select></p>
                <p><input type="text" placeholder="Question"</p>
                <p><input type="submit" value="Submit" /></p>
            </form>
    </div>
</body>
</html>