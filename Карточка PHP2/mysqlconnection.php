<?php
$connection = mysqli_connect('localhost','root','Shooter2828054','отделкадров');
if(!$connection)
    die("нет подключения");

// Вывод полей из таблицы "Сотрудники"
$query = "SELECT фамилия, имя, отчество, пол, дата_рождения, адрес_прописки, должность, подразделение FROM Сотрудники";
$result = mysqli_query($connection, $query);

if($result) {
    echo "<h2>Поля из таблицы \"Сотрудники\"</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $key => $value) {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
} else {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}

$deleteQuery = "DELETE FROM Сотрудники WHERE должность = 'техник-программист'";
$deleteResult = mysqli_query($connection, $deleteQuery);

if($deleteResult) {
    echo "<p>Удаление сотрудников с должностью 'техник-программист' выполнено успешно.</p>";
} else {
    echo "Ошибка при выполнении запроса на удаление: " . mysqli_error($connection);
}

$allRecordsQuery = "SELECT * FROM Сотрудники";
$allRecordsResult = mysqli_query($connection, $allRecordsQuery);

if($allRecordsResult) {
    echo "<h2>Все записи из таблицы \"Сотрудники\" после удаления</h2>";
    while ($row = mysqli_fetch_assoc($allRecordsResult)) {
        foreach ($row as $key => $value) {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
} else {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
