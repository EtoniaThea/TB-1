<?php

require 'function.php';

session_start();

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = md5($_POST['password']);

    $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";

    $result = mysqli_query($db, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['users_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['nama'];
            header('location:index.php');

        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['nama'];
            header('location:index.php');

        }
    } else {
        $error[] = 'incorrect username or password!';
    }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style_form_register.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>login now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>
            <input type="username" name="username" required placeholder="enter your username">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register.php">register now</a></p>
        </form>

    </div>

</body>

</html>