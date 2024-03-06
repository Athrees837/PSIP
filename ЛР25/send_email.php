<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "nikitka.savitskiy.95@mail.ru";
    $subject = "Новая заявка с формы";

    $message = "Имя: " . $_POST["firstName"] . "\n";
    $message .= "Фамилия: " . $_POST["lastName"] . "\n";
    $message .= "Возраст: " . $_POST["age"] . "\n";
    $message .= "Интересы: " . $_POST["interests"] . "\n";

    $headers = "From: nikitka.savitskiy.95@mail.ru";

    mail($to, $subject, $message, $headers);

    echo "Письмо успешно отправлено!";
} else {
    header("Location: laba25.php");
    exit();
}
?>
