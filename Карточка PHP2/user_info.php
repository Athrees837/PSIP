<?php
session_start();

if (isset($_SESSION['fullName']) && isset($_SESSION['password'])) {
    echo "ФИО: " . htmlspecialchars($_SESSION['fullName']) . "<br>";
    echo "Пароль: " . htmlspecialchars($_SESSION['password']) . "<br>";
    echo "Идентификатор сессии: " . session_id();
} else {
    echo "Сессионные переменные не установлены.";
}
?>