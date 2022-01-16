<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="A short description." />
	<meta name="keywords" content="put, keywords, here" />
	<title>Forum</title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="../QR_V3/qr.min.js"></script>
</head>

<body>

	<div class="page-border">

		<div class="intro-box">

			<h1 class="intro-text">my forum</h1>
			<div class="nav-left">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" width="40" fill="currentColor" onclick="location.href='#demo-modal'">
					<path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
					<path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
				</svg>
				<svg class="navi-home" xmlns="http://www.w3.org/2000/svg" viewBox="-2 -1.5 24 24" width="40" fill="currentColor" onclick="location.href='/WebProject/navigation-page.html'">
					<path d="M13 20.565v-5a3 3 0 0 0-6 0v5H2a2 2 0 0 1-2-2V7.697a2 2 0 0 1 .971-1.715l8-4.8a2 2 0 0 1 2.058 0l8 4.8A2 2 0 0 1 20 7.697v10.868a2 2 0 0 1-2 2h-5z">
					</path>
				</svg>
			</div>

		</div>
		<!--Dynamic QR Code-->
		<div id="demo-modal" class="modal">
			<div class="modal__content">
				<h1 class="qr-h1">share your code</h1>

				<form>
					<input type="url" id="website" name="website" placeholder="copy and paste" required class="qr-box" />
					<button type="button" onclick="generateQRCode()" class="item2">
						GENERATE
					</button>
				</form>

				<div id="qrcode-container">
					<div id="qrcode" class="qrcode"></div>
				</div>

				<svg xmlns="http://www.w3.org/2000/svg" class="navi-home" viewBox="0 0 20 20" fill="currentColor" width="50" onclick="location.href='#'">
					<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
				</svg>

				<script type="text/javascript">
					function generateQRCode() {
						let website = document.getElementById("website").value;
						if (website) {
							let qrcodeContainer = document.getElementById("qrcode");
							qrcodeContainer.innerHTML = "";
							new QRCode(qrcodeContainer, website);
							
							document.getElementById("qrcode-container").style.display = "block";
						} else {
							alert("Please enter a valid URL");
						}
					}
				</script>
			</div>
		</div>
		<!---------------------------------- Dynamic QR Code - END --------------------------------------------->
		<div class="container">
			<div id="wrapper">
				<div id="menu">
					<div class="menu-left">
						<a id="item" href="index.php">home</a>

						<?php
						if (isset($_SESSION['signed_in']) and $_SESSION['signed_in'] == True) {
							echo '<a id="item" href="create_topic.php">create topic</a>  ';
							echo '<a id="item" href="create_cat.php">create category</a>';
						} else {
						}
						?>
					</div>

					<div class="menu-right">
						<?php
						if (isset($_SESSION['signed_in']) and $_SESSION['signed_in'] == True) {

							echo '<div class="logged-user">welcome, ' . $_SESSION['user_name'] . '</div>' . '</b> <a id="item" href="signout.php">sign out</a>';
						} else {
							echo '<a id="item" href="signin.php">sign in</a> <a id="item" href="signup.php">create account</a>';
						}
						?>
					</div>



				</div>
				<div id="content">