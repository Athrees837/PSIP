<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с отправкой на почту</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
`
<form method="post" action="send_email.php">
    <label for="firstName">Имя:</label>
    <input type="text" id="firstName" name="firstName" required>

    <label for="lastName">Фамилия:</label>
    <input type="text" id="lastName" name="lastName" required>

    <label for="age">Возраст:</label>
    <input type="number" id="age" name="age" required>

    <label for="interests">Интересы:</label>
    <textarea id="interests" name="interests" rows="4" required></textarea>

    <button type="submit">Отправить</button>
</form>

</body>
</html>
