<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка данных авторизации

    $login = $_POST['login'];
    $password = $_POST['password'];

    // Здесь должен быть код для проверки данных в базе данных или файле
    // Пример: проверка в файле
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($storedLogin, $email, $storedPassword) = explode('|', $user);
        if ($login === $storedLogin && password_verify($password, $storedPassword)) {
            $_SESSION['login'] = $login;
            header('Location: user.php');
            exit();
        }
    }

    // В случае неверных данных
    $error = "Неверный логин или пароль.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
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

        p {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<form method="post" action="login.php">
    <h2>Авторизация</h2>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    Логин: <input type="text" name="login" required><br>
    Пароль: <input type="password" name="password" required><br>
    <input type="submit" value="Войти">
</form>
</body>
</html>