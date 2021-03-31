<div id="ajax-wrap">
<div id="text">
<!--<h1>Історія платежів</h1>-->
<div class="container bootstrap snippets bootdeys">
<ul class="cbp_tmtimeline">

<?php

if (isset($_GET["lg"]) && isset($_GET["pp"])) {
	$client_login = $_GET["lg"];
	$client_pp = $_GET["pp"];
}
$ses1 = '';
$cs = '';
$cn = '';
//$client_login = 'derevmolod20-pilorama';
$cash_arr = array();
$arr_balance = array();
$current_balance = 0;
$date_price = 0;
// Инициализируем курл
//$ch = curl_init('http://stat.faust.net.ua/blocked/lk.php?lg='.$client_ip);
$ch = curl_init('https://noc.faust.kiev.ua/public/client_pays.php?lg='.$client_login);

// Параметры курла
curl_setopt($ch, CURLOPT_USERAGENT, 'IE20');
curl_setopt($ch, CURLOPT_HEADER, 0);
// Следующая опция необходима для того, чтобы функция curl_exec() возвращала значение а не выводила содержимое переменной на экран
curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');

// Получаем html
$cash = curl_exec($ch);
$tmp =  preg_replace('/<(.*?)>/', '', urldecode($cash));
$cash_arr = unserialize(trim($tmp));
// Отключаемся
curl_close($ch);

// Находим и сохраняем нужный фрагмент
$pay_arr = array_reverse($cash_arr);
foreach ($cash_arr as $pays_arr) {
	if ($pays_arr['cash']!=0) {
		$current_balance = $current_balance + $pays_arr['cash'];
		$arr_balance[$pays_arr['timedate']]=round($current_balance,2);
	}
}
  function getBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
  }
foreach ($pay_arr as $cash_pay_arr) {
	if ($cash_pay_arr['cash']!=0) {
	if ($cash_pay_arr['cash']<0) { $arrow = 'fa-minus'; $cbp_tmlabel = 'cbp_tmlabel_1'; } else { $arrow = 'fa-plus'; $cbp_tmlabel = 'cbp_tmlabel_2'; } 
	if ($cash_pay_arr['coment']!='' && isset($cash_pay_arr['coment'])) { $date_paket = trim(getBetween($cash_pay_arr['coment'],'Пакет:','INTERNET:')); } else { $date_paket = ''; }
	$date_price=$cash_pay_arr['cash']*(-1);
	if ($date_paket!='' && !preg_match("/".$date_price."/", $date_paket)) { $date_price=''; }
	if (preg_match("/(За услуги доступа в интернет)/",$cash_pay_arr['coment'])) { $coment = "За послугу доступу до Інтернет"; }
	elseif (preg_match("/(За услугу Обещанный платеж)/",$cash_pay_arr['coment'])) { $coment = "За послугу подовження доступу на 5 днів"; }
	else { $coment = $cash_pay_arr['category']; }
    echo '
	<li>
		<time class="cbp_tmtime" datetime="'.$cash_pay_arr['date'].'"><span>'.$cash_pay_arr['date'].'</span> <span>'.$cash_pay_arr['time'].'</span></time>
		<div class="cbp_tmicon"><div class="content_wrapper"><i class="fas '.$arrow.'"></i></div></div>
		<div class="'.$cbp_tmlabel.'">
			<h4>'.$coment.'</h4>
			<p>'.$cash_pay_arr['cash'].' грн.   Баланс: '.$arr_balance[$cash_pay_arr['timedate']].'</p>
		</div>
	</li>';
}
}

?>

</ul>
</div>
</div>
</div>