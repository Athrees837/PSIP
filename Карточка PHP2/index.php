<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Ключевые слова">
    <link rel="stylesheet" href="style.css">
    <title>Савицкий Никита</title>
</head>
<body>

<?php
    $connection = mysqli_connect('localhost','root','Shooter2828054','отделкадров')
?>


<form action="submit.php" method="POST">
    <div>
        <label for="fullName">ФИО:</label>
        <input type="text" id="fullName" name="fullName" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="confirmPassword">Повтор пароля:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
    </div>
    <div class="terms">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">Я принимаю <a href="your-terms-url">пользовательское соглашение</a></label>
    </div>
    <div>
        <button type="submit">Зарегистрироваться</button>
    </div>
</form>

</body>
</html>