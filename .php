<?php
// Создадим глобальную переменную для подсчета количества сгенерированных паролей
$generatedPasswordsCount = 0;

// Создадим статическую переменную для хранения сгенерированных паролей
$generatedPasswords = [];

// Функция для генерации случайной строки
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Функция для генерации случайного пароля заданной длины
function generateRandomPassword($length) {
    global $generatedPasswordsCount, $generatedPasswords;

    // Увеличиваем счетчик сгенерированных паролей
    $generatedPasswordsCount++;

    // Генерируем случайный пароль пока он не будет уникальным
    do {
        $password = generateRandomString($length);
    } while (in_array($password, $generatedPasswords));

    // Добавляем сгенерированный пароль в массив сгенерированных паролей
    $generatedPasswords[] = $password;

    return $password;
}

// Задаем длину пароля
$passwordLength = 10;

// Генерируем случайный пароль
$password = generateRandomPassword($passwordLength);

// Выводим сгенерированный пароль
echo "Сгенерированный пароль: $password";

// Выводим количество сгенерированных паролей
echo "<br>Количество сгенерированных паролей: $generatedPasswordsCount";
?>