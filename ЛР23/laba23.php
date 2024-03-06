<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма с информацией пользователя</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .form-container {
            display: flex;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .avatar-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 20px;
        }
        .avatar-section img {
            width: 100px; /* Размер аватарки */
            height: 100px; /* Размер аватарки */
            border-radius: 50%; /* Сделать аватарку круглой */
            object-fit: cover;
        }
        .user-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .user-info p {
            margin: 4px 0; /* Небольшой отступ между логином и почтой */
            font-size: 16px; /* Размер шрифта для логина и почты */
        }
        .upload-btn {
            margin-top: 10px;
            cursor: pointer;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .send-email-btn {
            margin-top: 10px;
            cursor: pointer;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="avatar-section">
        <img id="avatarImage" src="avatar-placeholder.png" alt="Аватар пользователя">
        <input type="file" id="fileInput" style="display: none;"> <!-- Скрытое поле для загрузки файла -->
        <button class="upload-btn" onclick="uploadImage()">Загрузить файл</button>
    </div>
    <div class="user-info">
        <p>Athrees</p>
        <p>nikitka.savitskiy.95@mail.ru</p>
    </div>
</div>

<script>
    function uploadImage() {
        // Получаем ссылки на элементы
        var fileInput = document.getElementById('fileInput');
        var avatarImage = document.getElementById('avatarImage');

        // Привязываем событие выбора файла к скрытому полю input
        fileInput.addEventListener('change', function () {
            var file = fileInput.files[0];

            // Проверяем, что файл выбран и это изображение
            if (file && file.type.startsWith('image/')) {
                // Создаем объект FileReader для чтения изображения
                var reader = new FileReader();

                // Событие, которое срабатывает после успешного чтения файла
                reader.onload = function (e) {
                    // Устанавливаем полученное изображение в src тега img
                    avatarImage.src = e.target.result;
                };

                // Читаем выбранный файл как Data URL (base64)
                reader.readAsDataURL(file);
            }
        });

        // Симулируем клик по скрытому полю input
        fileInput.click();
    }
</script>

</body>
</html>
