<?php
if (isset($_POST["login"]) && isset($_POST["password"]) ) { 
$lgs= $_POST['login'];
$pw = $_POST['password'];

if ($_POST['check'] && $_POST['check']=='yes') { $c = 'yes'; } else { $c = 'no'; }

// Инициализируем курл
$ch = curl_init('https://noc.faust.kiev.ua/public/blocked/lk.php?lgs='.$lgs.'&pw='.$pw.'&ch='.$c);

// Параметры курла
curl_setopt($ch, CURLOPT_USERAGENT, 'IE20');
curl_setopt($ch, CURLOPT_HEADER, 0);
// Следующая опция необходима для того, чтобы функция curl_exec() возвращала значение а не выводила содержимое переменной на экран
curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');

// Получаем html
$check = curl_exec($ch);
$tmp =  preg_replace('/<(.*?)>/', '', urldecode($check));
$check_arr = unserialize(trim($tmp));
// Отключаемся
curl_close($ch);
   // Переводим массив в JSON
   echo json_encode($check_arr); 
}

?>