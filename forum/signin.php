<?php
//signin.php
include 'database.php';
include 'header.php';

echo '<font style="font-size: 36px;font-family: \'Major Mono Display\'; font-weight:600;">sign in</font><br><br>';


//new PDO execution
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
	echo '<br><font style="font-size: 18px;">You are already signed in.</font><br><br>';
} else {
	$errors = array();

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {

		echo '<form method="post" action="">
			<font style="font-size: 18px;">Username: </font><input type="text" name="user_name"></input><br><br>
			<font style="font-size: 18px;">Password: </font><input type="password" name="user_pass"></input><br><br>
			<div class="h-captcha" data-sitekey="10000000-ffff-ffff-ffff-000000000001" data-theme="dark"></div> 
			<input id="item" type="submit" value="sign in" class="login-text" name="buttonLogin"></input>
		 </form>';
	} else {
		if (isset($_POST['buttonLogin'])) {
			if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {

				$stmt = $conn->prepare('select * from users where user_name = :user_name');
				$stmt->bindValue('user_name', $_POST['user_name']);
				//$stmt->bindValue('user_level',$_POST['user_level']);

				try {
					$stmt->execute();
					$users = $stmt->fetch(PDO::FETCH_OBJ);
					if ($users != NULL) {
						if (password_verify($_POST['user_pass'], $users->user_pass)) {

							$_SESSION['signed_in'] = true;
							$_SESSION['user_name'] = $_POST['user_name'];
							$_SESSION['user_level'] = $users->user_level;
							$_SESSION['user_id'] = $users->user_id;


							echo '<br><font style="font-size: 18px;">Welcome, ' . $_SESSION['user_name'] . '. <br /><a href="index.php">Proceed to the forum overview</a>.</font><br><br>';

						} elseif (!password_verify($_POST['user_pass'], $users->user_pass)) {
							$error = 'Account Invalid';
							echo 'Wrong Username/Password';
						}
					} else {
						$error = 'Account Invalid';
						echo 'Account Invalid';
					}
				} catch (exception $e) {
					echo 'You are unable to login to the account.';
				}
			} else {
				echo 'Something went wrong while hCaptcha Validation. Please try again.';
			}
		} else {
			echo 'Something went wrong .';
		}
	}
}


include 'footer.php';
//mysqli_close($connect_database);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<script tyoe="text/JavaScript">
		var refreshButton = document.querySelector(".refresh-captcha");
		refreshButton.onclick = function() {
			document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
		}
	</script>
</body>

</html>