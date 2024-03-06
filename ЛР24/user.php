<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

$login = $_SESSION['login'];

// Загрузка данных пользователя (например, из базы данных или файла)
$users = file('users.txt', FILE_IGNORE_NEW_LINES);
foreach ($users as $user) {
    list($storedLogin, $email, $storedPassword) = explode('|', $user);
    if ($login === $storedLogin) {
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь</title>
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

        div {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            margin-top: 10px;
            color: #555;
        }

        a {
            display: block;
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div>
    <h2>Добро пожаловать, <?php echo $login; ?>!</h2>
    <p>Ваша почта: <?php echo $email; ?></p>
    <a href="index.php">Выйти</a>
</div>
</body>
</html>
