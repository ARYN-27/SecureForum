<?php
require 'database.php';
if (isset($_POST['buttonSave'])) {
    $errors = array();

    if ($_SESSION['user_level'] != 1) {
        //the user is not an admin
        echo '<br><font style="font-size: 14px;">Sorry, you do not have sufficient rights to access this page.</font><br><br>';
    } else {
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['password'])) {
            echo '<br><font style="font-size: 18px;">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</font><br><br>';
        } else {
            //$errors = array(); /* declare the array for later use */

            if (isset($_POST['username'])) {
                //the user name exists
                if (!ctype_alnum($_POST['username'])) {
                    $errors[] = '<br><font style="font-size: 18px;">The username can only contain letters and digits.</font><br><br>';
                }
                if (strlen($_POST['username']) > 30) {
                    $errors[] = '<br><font style="font-size: 18px;">The username cannot be longer than 30 characters.</font><br><br>';
                }
            } else {
                $errors[] = '<br><font style="font-size: 18px;">The username field must not be empty.</font><br><br>';
            }

            //password check
            if (isset($_POST['password'])) {
                /*
                    if ($_POST['password'] != $_POST['password_check']) {
                        $errors[] = '<br><font style="font-size: 18px;">The two passwords did not match.</font><br><br>';
                    }
                */
            } else {
                $errors[] = '<br><font style="font-size: 18px;">The password field cannot be empty.</font><br><br>';
            }

            //email validation
            /*
                if (isset($_POST['user_email'])) {
                    if (!filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL)) { //email sanitization
                        if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {  //email validation  //HTML Required is acting as the first gate
                            $errors[] = '<br><font style="font-size: 18px;">The email is not valid.</font><br><br>';
                        } else {
                            //echo "No validation failed ";
                        }
                    }
                } else {
                    $errors[] = '<br><font style="font-size: 18px;">This email field cannot be empty.</font><br><br>';
                }
            */

            if (!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/ {
                echo '<br><font style="font-size: 18px;">Uh-oh.. a couple of fields are not filled in correctly..</font><br><br>';
                echo '<ul>';
                foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
                    echo '<li>' . $value . '</li>'; /* this generates a nice error list */
                }
                echo '</ul>';
            } else {
                //userlevel testing; admin access == 1
                //$userlevel = 1;
                $stmt = $conn->prepare('insert into account(username, password, fullName, userlevel) values(:username, :password, :fullName, 1)');
                $stmt->bindValue('username', $_POST['username']);
                $stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_BCRYPT));
                $stmt->bindValue('fullName', $_POST['fullName']);
                //$stmt->bindParam('userlevel', $_POST['userlevel']);
                $stmt->execute();
                //header('location:index.php');
                //insert PDO here
                /*
                    if (!$result) {
                        //something went wrong, display the error0 
                        echo 'We are unable to register your account. Please try again later.';
                        //echo mysql_error(); //debugging, uncomment when needed
                    } else {
                        echo '<br><font style="font-size: 18px;">Succesfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)</font><br><br>';
                    }
                */
            }
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="fullName">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="Save" name="buttonSave">
                </td>
            </tr>
        </table>
</body>

</html>