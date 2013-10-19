<?php
require_once('./lib.php');

$url = 'http://dateandtime.info/ru/city.php?id=524901';
$pattern = '/Заход солнца: \n\t<span.*>\d{2}:\d{2}/m';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //для записи результата в переменную
curl_setopt($ch, CURLOPT_HEADER, 0);
$response = curl_exec($ch); //только если установлен параметр CURLOPT_RETURNTRANSFER true
curl_close($ch);

preg_match_sunset($pattern, $response);

### write to file
/*
//Инициализируем cURL-сессию
$url = 'http://dateandtime.info/ru/city.php?id=524901';
$ch = curl_init ($url);

### Или так:
#	$ch = curl_init (); //без параметра
#	curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");

//открываем для записи файл yandex.txt
//сюда внесём исходный html-код
$fp = fopen("url.txt", "w");
 
//указываем куда копировать содержимое
//По умолчанию используется поток вывода STDOUT (окно браузера).
curl_setopt($ch, CURLOPT_FILE, $fp);
 
//Заголовок - не выводим
curl_setopt($ch, CURLOPT_HEADER, 0);
 
//Поехали!
curl_exec($ch);
 
//Закрываем cURL-сессию
curl_close($ch);
 
//Закрываем дексриптор файла
fclose($fp);
 
//И вставляем на страницу полученный код
include 'url.txt';
*/
?>