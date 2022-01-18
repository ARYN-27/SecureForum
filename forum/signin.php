<?php
//signin.php
include 'database.php';
include 'header.php';

echo '<font style="font-size: 36px;font-family: \'Major Mono Display\'; font-weight:600;">sign in</font><br><br>';

if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
	echo '<br><font style="font-size: 18px;">You are already signed in.</font><br><br>';
} else {
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {

		echo '<form method="post" action="">
			<font style="font-size: 18px;">Username: </font><input type="text" name="user_name"></input><br><br>
			<font style="font-size: 18px;">Password: </font><input type="password" name="user_pass"></input><br><br>
			<input id="item" type="submit" value="sign in" class="login-text"></input>
		 </form>';
	} else {
		/* so, the form has been posted, we'll process the data in three steps:
			1.	Check the data
			2.	Let the user refill the wrong fields (if necessary)
			3.	Varify if the data is correct and return the correct response
		*/
		$errors = array();
		if (!isset($_POST['user_name'])) {
			$errors[] = '<br><font style="font-size: 18px;">The username field must not be empty.</font><br><br>';
		}

		if (!isset($_POST['user_pass'])) {
			$errors[] = '<br><font style="font-size: 18px;">The password field must not be empty.</font><br><br>';
		}

		if (!empty($errors)) {
			echo '<br><font style="font-size: 18px;">fields are not filled in correctly..</font><br><br>';
			echo '<ul>';
			foreach ($errors as $key => $value) {
				echo '<li>' . $value . '</li>';
			}
			echo '</ul>';
		} else {

			$sql = "SELECT 
						user_id,
						user_name,
						user_level
					FROM
						users
					WHERE
						user_name = '" . $_POST['user_name'] . "'
					AND
						user_pass = '" . hash('sha256', $_POST['user_pass']) . "'";

			$result = mysqli_query($connect_database, $sql);
			if (!$result) {
				echo '<br><font style="font-size: 18px;">Something went wrong while signing in. Please try again later.</font><br><br>';
			} else {
				if (mysqli_num_rows($result) == 0) {
					echo '<br><font style="font-size: 18px;">You have supplied a wrong user/password combination. Please try again.</font><br><br>';
				} else {

					$_SESSION['signed_in'] = true;


					while ($row = mysqli_fetch_assoc($result)) {
						$_SESSION['user_id'] 	= $row['user_id'];
						$_SESSION['user_name'] 	= $row['user_name'];
						$_SESSION['user_level'] = $row['user_level'];
					}

					echo '<br><font style="font-size: 18px;">Welcome, ' . $_SESSION['user_name'] . '. <br /><a href="index.php">Proceed to the forum overview</a>.</font><br><br>';
				}
			}
		}
	}
}

include 'footer.php';
mysqli_close($connect_database);
