<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : 'Не указано';
    $email = isset($_POST['email']) ? $_POST['email'] : 'Не указано';
    $password = isset($_POST['password']) ? $_POST['password'] : 'Не указано';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : 'Не указано';
    $terms = isset($_POST['terms']) ? 'Принято' : 'Не принято';


    echo "ФИО: " . htmlspecialchars($fullName) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Пароль: " . htmlspecialchars($password) . "<br>";
    echo "Повтор пароля: " . htmlspecialchars($confirmPassword) . "<br>";
    echo "Условия использования: " . $terms . "<br>";
} else {
    echo "Форма не была отправлена!";
}
?>




