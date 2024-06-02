<?php
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['password'];
$email = $_POST['email'];

if (!empty($login) && !empty($pass) && !empty($email)) {
    $sql = "INSERT INTO `users` (login, pass, email) VALUES ('$login', '$pass', '$email')";
    $conn->query($sql);
    header("Location: /kabinet.php?id=$id");
    die();
} else {
    echo "Заполните все поля";
}
?>
