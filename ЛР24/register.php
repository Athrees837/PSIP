<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка данных регистрации

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля

    // Здесь должен быть код для сохранения данных в базе данных или в файле
    // Пример: сохранение в файл
    file_put_contents('users.txt', "$login|$email|$password\n", FILE_APPEND);

    // Устанавливаем сессию для автоматической авторизации после регистрации
    $_SESSION['login'] = $login;

    // Перенаправление на страницу пользователя
    header('Location: user.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <form method="post" action="register.php">
        <h2>Регистрация</h2>

        Логин: <input type="text" name="login" required><br>
        Почта: <input type="email" name="email" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>
