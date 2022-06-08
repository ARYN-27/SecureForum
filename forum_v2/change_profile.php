<?php
session_start();
require 'database.php';

$stmt = $conn->prepare('select * from account where username = :username');
$stmt->bindValue('username', $_SESSION['username']);
$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_OBJ);

if(isset($_POST['buttonSave'])) {
    $stmt = $conn->prepare('update account set password = :password,
		fullName = :fullName, username = :username where id = :id');
	$stmt->bindValue('username', $_POST['username']);
	$stmt->bindValue('password', $_POST['password'] == '' ? $account->password : password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindValue('fullName', $_POST['fullName']);
    $stmt->bindValue('id', $_POST['id']);
	$stmt->execute();
	header('location:index.php');
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
                <td>Id</td>
                <td>
                    <?php echo $account->id; ?>
                    <input type="hidden" name="id"
                        value="<?php echo $account->id; ?>">
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username"
                        value="<?php echo $account->username; ?>">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" >
                </td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="fullName" value="<?php echo $account->fullName; ?>">
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