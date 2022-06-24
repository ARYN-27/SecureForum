<?php
//create_cat.php
include 'database.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

	echo '<br><font style="font-size: 14px;">This file cannot be called directly.</font><br><br>';
} else {
	//check for sign in status
	if (!isset($_SESSION['signed_in'])) {
		echo '<br><font style="font-size: 14px;">You must be signed in to post a reply.</font><br><br>';
	} else {

		if (empty($_POST['reply-content'])) {
			echo '<br><font style="font-size: 14px;">Reply cannot be empty ' . '</font><br><br>';
		} else {
			//a real user posted a real reply
			//USER CODE CHECK
			$query = "SELECT 
						user_code
					FROM
						users
					WHERE
						user_id = '" . $_SESSION['user_id'] . "'
					AND
						user_code = '" . hash('sha256', $_POST['user_code']) . "'";

			$pass_check = mysqli_query($connect_database, $query);
			$row = mysqli_fetch_array($pass_check);
			$user_code_check = hash('sha256', $_POST['user_code']);

			if ($row['user_code'] == $user_code_check) {
				$sql = "INSERT INTO 
						posts(post_content,
							post_date,
							post_topic,
							post_by) 
					VALUES ('" . addslashes($_POST['reply-content']) . "',
							NOW(),
							" . $_GET['id'] . ",
							" . $_SESSION['user_id'] . ")";

				$result = mysqli_query($connect_database, $sql);

				if (!$result) {
					echo '<br><font style="font-size: 14px;">Your reply has not been saved, please try again later.</font><br><br>';
				}
				/*
				if ($_POST['reply-content'] == "%00" ) {
					echo '<br><font style="font-size: 14px;">Error: Null Byte detected ' . '</font><br><br>';
				}
			*/ else {
					echo '<br><font style="font-size: 14px;">Your reply has been saved, check out <a href="topic.php?id=' . $_GET['id'] . '">the topic</a>.</font><br><br>';
				}
			} else {
				echo '<br><font style="font-size: 14px;">Wrong Code ⚠</font><br><font style="font-size: 14px;">' . '</font><br>';
			}
		}
	}
}

include 'footer.php';
mysqli_close($connect_database);
