<?php
$connection = mysqli_connect('localhost','root','','mydatabase');
if(!$connection)
    die("нет подключения");

$query = "SELECT LastName, Passport, ProductName, DateIssued, DateReturned, RentalCostPerDay FROM Clients";
$result = mysqli_query($connection, $query);

if($result) {
    echo "<h2>Поля из таблицы \"Clients\"</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $key => $value) {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
} else {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}

$deleteQuery = "DELETE FROM Clients WHERE ProductName = 'ХОЛОДИЛЬНИК'";
$deleteResult = mysqli_query($connection, $deleteQuery);

if($deleteResult) {
    echo "<p>Удаление записи с наименованием товара ХОЛОДИДЬНИК выполнено успешно.</p>";
} else {
    echo "Ошибка при выполнении запроса на удаление: " . mysqli_error($connection);
}

$allRecordsQuery = "SELECT * FROM Clients";
$allRecordsResult = mysqli_query($connection, $allRecordsQuery);

if($allRecordsResult) {
    echo "<h2>Все записи из таблицы \"Clients\" после удаления</h2>";
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
