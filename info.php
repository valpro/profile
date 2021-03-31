<div id="ajax-wrap">
<div id="text">
<!--<h1>Основна інформація</h1>-->
<?php

if (isset($_GET["lg"]) && isset($_GET["pp"])) {
	$client_login = $_GET["lg"];
	$client_pp = $_GET["pp"];
}
//$client_login = 'landpetl8-box.2';
$year_now=date('Y');
$mon_now=date('m');
$current_balance = 0;

$date = date_create();
$t = date_timestamp_get($date);

$ch = curl_init('https://noc.faust.kiev.ua/public/login_profile.php?lg='.$client_login);

// Параметры курла
curl_setopt($ch, CURLOPT_USERAGENT, 'IE20');
curl_setopt($ch, CURLOPT_HEADER, 0);
// Следующая опция необходима для того, чтобы функция curl_exec() возвращала значение а не выводила содержимое переменной на экран
curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');

// Получаем html
$info = curl_exec($ch);
$tmp =  preg_replace('/<(.*?)>/', '', urldecode($info));
$info_arr = unserialize(trim($tmp));

// Отключаемся
curl_close($ch);

// Находим и сохраняем нужный фрагмент
$client_balance = $info_arr['balance'];
$client_dolg = $info_arr['dolg'];
$client_pay = $info_arr['pay'];
$client_ip = $info_arr['ip'];
$client_fio = $info_arr['fio'];
$client_state = $info_arr['state'];
$client_dis = $info_arr['dis'];
$client_contract_date = $info_arr['ct_date'];
$client_paket = $info_arr['paket'];
$tarif_price = $info_arr['tarif_price'];
$client_next_paket = $info_arr['nxt_paket'];
$nxt_tarif_price = $info_arr['nxt_tarif_price'];
$srvs = $info_arr['srvs'];
$is_creit = $info_arr['is_creit'];

//=================================================================
$cash_arr = array();
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
//=================================================================
echo '
		<!-- UI X -->
		<div class="ui-22">
			<!-- Container fluid -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<!-- UI Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Ваш логін</h2>
							<!-- Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.$client_login.'</h3>
								<!-- icon -->
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>П.І.Б.</h2>
							<!-- Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.$client_fio.'</h3>
								<!-- Icon -->
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Тарифний план</h2>
							<!-- Item Inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.$client_paket.'</h3>
								<!-- Icon -->
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
if ($client_next_paket!=0) {
echo				'<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Наступний тарифний план</h2>
							<!--Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.$client_next_paket.'</h3>;
								<!-- Icon -->
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
}						
echo				'<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Ваш баланс</h2>
							<!--Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.round($client_balance,2).' грн.</h3>
								<!-- Icon -->';
								if ($client_dolg < 0) { echo '<div class="coment">до сплати: '.$client_pay.'</div>'; }
echo							'</div>
							<div class="clearfix"></div>
						</div>
					</div>
                    <div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Поточний стан послуги</h2>
							<!--Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.$client_state.'</h3>
								<!-- Icon -->';
							//Если можно активировать обещанный платеж, то добавить кнопку
					        if ($is_creit == 0 && $client_state == 'Деактивовано') {
		echo '			<i id="credit">Кредит на 5 днів</i>';
							} elseif ($is_creit != 0 && $client_state == 'Активовано') {
		echo '			<i id="credit">Працюєте в кредит !</i>';								
							}
echo				'		</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>IP адреса</h2>
							<div class="ui-item-inner">
								<h3>'.$client_ip.'</h3>
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>дата контракту</h2>
							<!-- Iten Inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<h3>'.$client_contract_date.'</h3>
								<!-- Icon -->
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';				
		
echo				'<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Сплачено місяців в цьоу році</h2>
							<!--Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<span>
								<p>';
                                 $pay_arr = array_reverse($cash_arr);
                                 foreach ($cash_arr as $pays_arr) {
                                 	if ($pays_arr['cash']!=0) {
                                 		$current_balance = $current_balance + round($pays_arr['cash'], 2);
										$y_date = substr($pays_arr['date'],6,4);
										$m_date = substr($pays_arr['date'],3,2);
                                        $last_pays = $pays_arr['cash'];
										if ($y_date==$year_now && $current_balance>=0) { $mon_bal[(int) $m_date]=$current_balance; }
                                 	}
                                 }		
								 for ($i=1; $i<13; $i++)
								 {
									 if (isset($mon_bal[$i])) { showBadge($i); $nxt_date = $i + 1; }
								 }
                                 $col_months = floor(round($current_balance,2)/$tarif_price);
								 if ($last_pays>0 && $col_months>0) $col_months--;
								 $i=$nxt_date;
								 if ($col_months>=1) {
								  while ($i<($nxt_date+$col_months) && $i<13)
                                  {
									showBadge($i);
									$i++;
								  }
								 }
						         /*<span class="badge bg-info text-white">Зима</span>
						         <span class="badge bg-success text-white">Весна</span>
						         <span class="badge bg-danger text-white">Літо</span> 
						         <span class="badge bg-warning text-white">Осінь</span>	*/
echo					        '</p>
								</span>
								<!-- Icon -->
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
					
  function showBadge($month){
	if ($month>0 || $month<13) {
	$months = array(1=>'січень',2=>'лютий',3=>'березень',4=>'квітень',5=>'травень',6=>'червень',7=>'липень',8=>'серпень',9=>'вересень',10=>'жовтень',11=>'лисотпад',12=>'грудень');
	switch ($month) {
		case 1: echo '<span class="badge bg-info text-white">'.$months[1].'</span>'; break;
		case 2: echo '<span class="badge bg-info text-white">'.$months[2].'</span>'; break;
		case 3: echo '<span class="badge bg-success text-white">'.$months[3].'</span>'; break;
		case 4: echo '<span class="badge bg-success text-white">'.$months[4].'</span>'; break;
		case 5: echo '<span class="badge bg-success text-white">'.$months[5].'</span>'; break;
		case 6: echo '<span class="badge bg-danger text-white">'.$months[6].'</span>'; break;
		case 7: echo '<span class="badge bg-danger text-white">'.$months[7].'</span>'; break;
		case 8: echo '<span class="badge bg-danger text-white">'.$months[8].'</span>'; break;
		case 9: echo '<span class="badge bg-warning text-white">'.$months[9].'</span>'; break;
		case 10: echo '<span class="badge bg-warning text-white">'.$months[10].'</span>'; break;
		case 11: echo '<span class="badge bg-warning text-white">'.$months[11].'</span>'; break;
		case 12: echo '<span class="badge bg-info text-white">'.$months[12].'</span>'; break;
	}
  }
  }
  
echo "
<script type='text/javascript'>
setAttr('dl',".$client_pay.");
function setAttr(prmName,val){
    var res = '';
	var d = location.href.split('#')[0].split('?');
	var base = d[0];
	var query = d[1];
	if(query) {
		var params = query.split('&');
		for(var i = 0; i < params.length; i++) {
			var keyval = params[i].split('=');
			if(keyval[0] != prmName) {
				res += params[i] + '&';
			}
		}
	}
	res += prmName + '=' + val;
	window.location.href = base + '?' + res;
	console.log(window.location.href);
	return false;
}
</script>";

?>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="InfoTip" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Увага !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="InfoMsg" class="modal-body">
         <p>По Вашому запиту Вам буде нарахований тимчасовий платіж, і Ви зможете 5 днів користуватись нашими послугами. Вартість послуги 10 грн.</p>
		 <p>Не забудьте поповнити рахунок до закінчення терміна дії "кредитного платежу" !</p>
		 <!--<p>Через 5 днів після активації, сума "кредитного платежу" буде автоматично списана з Вашого рахунку.</p> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Відмінити</button>
        <button id="pay_out" type="button" class="btn btn-primary">Сплатити</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal --
<div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="ErrorTip" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Помилка !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="ErrorMsg" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>-->