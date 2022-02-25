<?php
    include "connect.php";
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    if ($db->connect_error) {
        die('Could not connect to the database');
    }

    $verifyQuery = $db->query("SELECT * FROM users WHERE code = '$code' and updated_at >= NOW() - INTERVAL 1 DAY" );

    if ($verifyQuery->num_rows == 0) {
        header("Location: login.php");
        exit();
    }

    if (isset($_POST['change'])) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        $hash_password = md5($new_password);

        $changeQuery = $db->query("UPDATE users SET password = '$hash_password' WHERE email = '$email' and code = '$code' and updated_at >= NOW() - INTERVAL 1 DAY");

        if ($changeQuery) {
            header("Location: success.html");
        }

    }
    $db->close();
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="card">
        <h1>Change Password</h1>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Enter Email"><br><br>
            <input type="password" name="new_password" placeholder="Enter Password"><br><br>
            <button type="submit" name="change">Change</button>
        </form>
    </div>
</body>

</html>