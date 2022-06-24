<?php
//create_cat.php
include 'database.php';
include 'header.php';

//echo '<font style="font-size: 18px;">Create a category</font>';
if ($_SESSION['signed_in'] == true || $_SESSION['user_level'] == 1) {
	//the user has admin rights
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		//the form hasn't been posted yet, display it
		echo '<form method="post" action="">
			<br><font style="font-size: 14px;">Category name: </font><input type="text" name="cat_name" /><br><br>
			<font style="font-size: 14px;">Category description:</font><br><textarea style="resize:none;" name="cat_description" rows="10" cols="70" wrap="hard"></textarea><br /><br />
			<input type="submit" value="add category" id="item"/>
		 </form>';
	} else {
		//the form has been posted, so save it
		if (empty($_POST['cat_name']) || empty($_POST['cat_description'])) {
			echo '<br><font style="font-size: 14px;">Category Name/Category Descripion cannot be empty ' . '</font><br><br>';
		} else {
			$sql = "INSERT INTO categories(cat_name, cat_description)
		   			VALUES('" . addslashes($_POST['cat_name']) . "',
				 	'" . addslashes($_POST['cat_description']) . "')";
			$result = mysqli_query($connect_database, $sql);
			if (!$result) {
				//something went wrong, display the error
				
				echo '<br><font style="font-size: 14px;">Error: ' . '</font><br><br>';
			} else {
				echo '<br><font style="font-size: 14px;">New category succesfully added.</font><br><br>';
			}
		}
	}
	
	
} elseif($_SESSION['signed_in'] == true){
	//the user is not an admin
	echo '<br><font style="font-size: 14px;">Sorry, you do not have sufficient rights to access this page.</font><br><br>';
}


include 'footer.php';
mysqli_close($connect_database);
