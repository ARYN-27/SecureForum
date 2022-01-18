<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="A short description." />
	<meta name="keywords" content="put, keywords, here" />
	<title>Forum</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

	<div class="page-border">

		<div class="intro-box">

			<h1 class="intro-text">my forum</h1>
			<div class="nav-left">
				<svg class="navi-home" xmlns="http://www.w3.org/2000/svg" viewBox="-2 -1.5 24 24" width="40" fill="currentColor" onclick="location.href='/WebProject/navigation-page.html'">
					<path d="M13 20.565v-5a3 3 0 0 0-6 0v5H2a2 2 0 0 1-2-2V7.697a2 2 0 0 1 .971-1.715l8-4.8a2 2 0 0 1 2.058 0l8 4.8A2 2 0 0 1 20 7.697v10.868a2 2 0 0 1-2 2h-5z">
					</path>
				</svg>
			</div>

		</div>

		<div class="container">
			<div id="wrapper">
				<div id="menu">
					<div class="menu-left">
						<a id="item" href="index.php">home</a>

						<?php
						if (isset($_SESSION['signed_in']) and $_SESSION['signed_in'] == True) {
							echo '<a id="item" href="create_topic.php">create topic</a>  ';
							echo '<a id="item" href="create_cat.php">create category</a>';
							if ($_SESSION['user_level'] != 0) {
								echo '<a id="item" href="signup_admin.php">register admin account</a>';
							}
						} else {
						}
						?>
					</div>

					<div class="menu-right">
						<?php
						
						if (isset($_SESSION['signed_in']) and $_SESSION['signed_in'] == True) {

							echo '<div class="logged-user">welcome, ' . $_SESSION['user_name'] . '</div>' . '</b> <a id="item" href="signout.php">sign out</a>';
							
						} 
						else {
							 
							echo '<a id="item" href="signin.php">sign in</a> <a id="item" href="signup.php">create account</a> ';
							

						}
						?>
					</div>



				</div>
				<div id="content">