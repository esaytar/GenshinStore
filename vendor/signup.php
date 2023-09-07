<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `surname`, `phone_number`, `email`, `password`) VALUES (NULL, '$name', '$surname', '$phone_number', '$email', '$password')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../login.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }
?>