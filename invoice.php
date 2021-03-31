<?php
if (isset($_POST["userid"]) && isset($_POST["amount"]) ) { 
$userid = $_POST['userid'];
$amount = $_POST['amount'];
// Инициализируем курл
$ch = curl_init('https://noc.faust.kiev.ua/public/invoice.php?userid='.$userid.'&amount='.$amount);

// Параметры курла
curl_setopt($ch, CURLOPT_USERAGENT, 'IE20');
curl_setopt($ch, CURLOPT_HEADER, 0);
// Следующая опция необходима для того, чтобы функция curl_exec() возвращала значение а не выводила содержимое переменной на экран
curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');

// Получаем html
$check = curl_exec($ch);
// Отключаемся
curl_close($ch);
   // Переводим массив в JSON
   echo $check; 
}
?>