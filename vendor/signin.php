<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "phone_number" => $user['phone_number'],
            "email" => $user['email']
        ];

        header("Location: ../index_profile.php");
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../login.php');
    }
?>

<pre>
    <?php
        print_r($check_user);
        print_r($user);
    ?>
</pre>