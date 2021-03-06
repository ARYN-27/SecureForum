<?php
//signup_admin.php
include 'database.php';
include 'header.php';

echo '<font style="font-size: 36px;font-family: \'Major Mono Display\'; font-weight:600;">sign up</font><br><br>';



if ($_SESSION['signed_in'] == true && $_SESSION['user_level'] != 1) {
    //the user is not an admin
    echo '<br><font style="font-size: 14px;">Sorry, you do not have sufficient rights to access this page.</font><br><br>';
} else {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        $errors = array();

        echo '<form method="post" action="">
                      <font style="font-size: 18px;">Username: </font><input type="text" name="user_name" style="border: 2px solid black;"></input><br><br>
                     <font style="font-size: 18px;">Password: </font><input type="password" name="user_pass" style="border: 2px solid black;"></input><br><br>
                    <font style="font-size: 18px;">Confirm your Password: </font><input type="password" name="user_pass_check" style="border: 2px solid black;"></input><br><br>
                    <font style="font-size: 18px;">E-mail: </font><input type="email" name="user_email" style="border: 2px solid black;"></input><br><br>
                    <font style="font-size: 18px;">Enter your special code: </font><input type="password" name="user_code" style="border: 2px solid black;"></input><br><br>
                    <div class="h-captcha" data-sitekey="10000000-ffff-ffff-ffff-000000000001" data-theme="dark"></div> 
                     <input type="submit" value="join here" id="item"></input>
                  </form>';
    } else {
        if ($_SESSION['user_level'] != 1) {
            //the user is not an admin
            echo '<br><font style="font-size: 14px;">Sorry, you do not have sufficient rights to access this page.</font><br><br>';
        } else {
            if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {
                if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['user_pass'])) {
                    echo '<br><font style="font-size: 18px;">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</font><br><br>';
                } else {
                    //$errors = array(); /* declare the array for later use */

                    if (isset($_POST['user_name'])) {
                        //the user name exists
                        if (!ctype_alnum($_POST['user_name'])) {
                            $errors[] = '<br><font style="font-size: 18px;">The username can only contain letters and digits.</font><br><br>';
                        }
                        if (strlen($_POST['user_name']) > 30) {
                            $errors[] = '<br><font style="font-size: 18px;">The username cannot be longer than 30 characters.</font><br><br>';
                        }
                    } else {
                        $errors[] = '<br><font style="font-size: 18px;">The username field must not be empty.</font><br><br>';
                    }

                    //password check
                    if (isset($_POST['user_pass'])) {

                        /*
                                if ($_POST['password'] != $_POST['password_check']) {
                                    $errors[] = '<br><font style="font-size: 18px;">The two passwords did not match.</font><br><br>';
                                }
                            */
                    } else {
                        $errors[] = '<br><font style="font-size: 18px;">The password field cannot be empty.</font><br><br>';
                    }

                    //email validation

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

                    //user_code validation
                    $user_code_length = strlen($_POST['user_code']);

                    if ($user_code_length > 3 || $user_code_length < 3) {
                        echo '<br><font style="font-size: 18px;">Your special code must be 3 characters.</font><br><br>';
                    } else {

                        if (!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/ {
                            echo '<br><font style="font-size: 18px;">Uh-oh.. a couple of fields are not filled in correctly..</font><br><br>';
                            echo '<ul>';
                            foreach ($errors as $key => $value)
                            //walk through the array so all the errors get displayed 
                            {
                                echo '<li>' . $value . '</li>';
                                //this generates a nice error list 
                            }
                            echo '</ul>';
                        } else {
                            //userlevel testing; admin access == 1
                            //$userlevel = 1;
                            //PARAMETERIZED QUERY
                            $stmt = $conn->prepare('insert into users(user_name, user_pass,user_email, user_level, user_code) values(:user_name, :user_pass, :user_email, 1, :user_code)');
                            $stmt->bindValue('user_name', $_POST['user_name']);
                            $stmt->bindValue('user_email', $_POST['user_email']);
                            $stmt->bindValue('user_pass', password_hash($_POST['user_pass'], PASSWORD_BCRYPT)); //PASSWORD HASHING WITH SALT USING BCRYPT
                            $stmt->bindValue('user_code', hash('sha256', $_POST['user_code']));
                            //$stmt->bindValue('fullName', $_POST['fullName']);
                            //$status=$stmt->execute();

                            try {
                                $status = $stmt->execute();

                                if (!$status) {
                                    //something went wrong, display the error0 
                                    //echo 'We are unable to register your account. Please try again later.';
                                    //echo mysql_error(); //debugging, uncomment when needed
                                } else {
                                    //catch test

                                    echo '<br><font style="font-size: 18px;">Succesfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)</font><br><br>';
                                }
                            } catch (exception $e) {
                                //echo 'We are unable to register your account. Please try again later.';
                            }

                            //header('location:index.php');
                            //insert PDO here


                        }
                    }
                }
            } else {
                echo 'Something went wrong while hCaptcha Validation. Please try again.';
            }
        }
    }
}



include 'footer.php';
//mysqli_close($connect_database);
