<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="public/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="public/css/style.css"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
</head>
<body>
<div class="main_block_nav_container">
	<h1 class="main_title"><a href="/">TTIC FAQ</a></h1>
</div>
<div class="topnav" id="myTopnav">
{% if session_admin %}
	  	<div class="topnav_container">
      <a href="?/panel">Admin Panel</a>
		<a href="?/about">About</a>
		<a href="#contact">Contact</a>
		<a href="?/login/logout">Log Out</a>
		<a href="javascript:void(0);" class="icon" onclick="makeResponsive()">
			<i class="fa fa-bars"></i>
		</a>
		</div>
		{% elseif session_user %}
		<div class="topnav_container">
		<a href="?/panel"></i>User Panel</a>
		<a href="?/about">About</a>
		<a href="#contact">Contact</a>
		<a href="?/login/logout">Log Out</a>
		<a href="javascript:void(0);" class="icon" onclick="makeResponsive()">
			<i class="fa fa-bars"></i>
		</a>
		</div>
		{% else %}
		<div class="topnav_container">
			<a href="/">Home</a>
			<a href="?/about">About</a>
			<a href="?/login">Log In</a>
			<a href="#contact">Contact</a>
			<a href="javascript:void(0);" class="icon" onclick="makeResponsive()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	{% endif %}
</div>

    <section class="about_main">
        <h1 class="about_main_header">Find your answers</h1>
        <h2 class="about_main_preheader">Simple to use and hard to overestimate. Summer project which was made with purpose to help people incresing their knowledges and broadening their minds in the ict(it) field.</h2>
        <img src="public/img/first.jpg" width="640px" height="425px" class="about_main_img">
    </section>


    <section class="features_section" id="features_section">
          <div class="features_header_section">
          <h2>TTIC FAQ features</h2>
          <p>A few aspects of why you should defenetly check out our service</p>
          </div>
        <div class="features_container">
          <div class="features">
            <div class="features_item">
            <div class="features_icon"></div>
              <h2>Problem solving</h2>
              <p>
              Great source of new knowledges
              </p>
            </div>
            <div class="features_item">
            <div class="features_icon"></div>
              <h2>Entertainment</h2>
              <p>
                You will enjoy the process of gaining information
              </p>
            </div>
            <div class="features_item">
            <div class="features_icon"></div>
              <h2>Simplicity</h2>
              <p>
                Made with care and love for newbees  
              </p>
            </div>

        
            <div class="features_item">
            <div class="features_icon"></div>
              <h2>Comfortability</h2>
              <p>
              Easy to manipulate
              </p>
            </div>
            <div class="features_item">
              <div class="features_icon"></div>
              <h2>Usability</h2>
              <p>
                Can be used on different devices, from cell phone to pc
              </p>
            </div>
            <div class="features_item">
                <div class="features_icon"></div>
                    <h2>Multilingualism</h2>
                    <p>
                        Answers might be given and found in multiple foreign langueges 
                    </p>
                </div>
            </div>
          </div>  
    </section>
    <section class="prefooter_section" id="contact">
	<div class="prefooter_header_section">
		<h3>Keep in touch with developers</h3>
		<p>Thanks for visiting our community site! It would be really fantastic to fetch some feedback from you!</p>
		<div class="prefooter_icons">
			<a target="__blank" href="https://github.com/IlmastMaksim"><i class="fa fa-github"></i></a>
			<a target="__blank" href="https://www.facebook.com/profile.php?id=100014949219835"><i class="fa fa-facebook"></i></a>
			<a target="__blank" href="https://www.linkedin.com/in/maksim-ilmast-8ba669151/"><i class="fa fa-linkedin"></i></a>
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
			{% if session_admin %}
			<li><a href="?/panel">Admin Panel</a></li>
			<li><a href="?/about">About</a></li>
            <li><a href="#contact">Contact</a></li>
			<li><a href="?/login/logout">Log Out</a></li>
			{% elseif session_user %}
			<li><a href="?/panel"></i>User Panel</a></li>
			<li><a href="?/about">About</a></li>
            <li><a href="#contact">Contact</a></li>
			<li><a href="?/login/logout">Log Out</a></li>
			{% else %}
			<li><a href="/">Home</a></li>
            <li><a href="?/about">About</a></li>
			<li><a href="?/login">Log In</a></li>
			<li><a href="#contact">Contact</a></li>
			{% endif %}
		</ul>
	</div>
</section>
<script src="public/js/lib/jquery-2.1.1.js"></script>
<script src="public/js/scroll.js"></script> <!-- Resource jQuery -->
</body>
</html>