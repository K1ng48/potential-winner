<?php
require_once('db.php');

// Получение данных пользователя
$login = $_POST['Логин'];
$pass = $_POST['Пароль'];

// Проверка данных
if(empty($login) || empty($pass))
{
    echo "Заполните все поля";
} else {
    // Сравнение с базой данных
    $sql = "SELECT * FROM `users` WHERE login = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        // Пользователь найден, проверка пароля
        $user = $result->fetch_assoc();
        if($user['pass'] === $pass)
        {
            // Установка сессии
            session_start();
            $_SESSION['login'] = $login;
            echo "Добро пожаловать " . $login;
            $id = $result->id;
            header("Location: /acc.php?id=$id");

        } else {
            $authError = true;
        }
    } else {
        $authError = true;
    }
}

// Вывод сообщения об ошибке
if (isset($authError)) {
    echo "<p style='color: red;'>Пользователь не найден</p>";
}
?>
