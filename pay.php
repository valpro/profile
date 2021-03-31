<div id="ajax-wrap">
<div id="text">
<?php
if (isset($_GET["lg"]) && isset($_GET["pp"])) {
	$client_login = $_GET["lg"];
	$client_pp = $_GET["pp"];
}
?>
		<h2 class="centered">ПЛАТІЖНІ СИСТЕМИ</h2>	
		<!-- UI X -->
		<div class="ui-22">
			<!-- Container fluid -->
			<div class="container-fluid">		
				<div class="row">
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Платіжна система Portmone.com.ua</h2>
							<!-- Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<div class="row justify-content-md-center">
								<div class="col col-lg-3"><img style="width: 100px;" class="p-2 bg-light" src="img/portmone.png" id="icon" alt="ipay" /></div>
								<div class="col-md-auto text-white">Система дозволяє оплатити наші послуги за допомогою міжнародних платіжних карт (Visa International, Europay International). 
								                                    Сервіс проведення платежів забезпечується Міжбанківською системою електронної доставки й оплати рахунків Portmone.com з використанням сучасного та безпечного механізму авторизації платіжних карт.
                                                                    Реквізити платіжних карт вводяться на сайті Portmone.com у захищеному режимі й недоступні працівникам.</div>
								</div>
								<!-- Icon -->
								<div class="text-center form_right">
								<!--<i id="ipay_pay">СПЛАТИТИ</i>-->
								    <form class="form-inline">
									<div class="form-group mx-sm-3 mb-2">
									  <input type="text" id="portmone_cash" class="transparent_" name="portmone_cash" placeholder="сума">
									</div>
                                      <!--<input type="text" id="login" class="third" name="login" placeholder="логін">-->
                                      <input type="submit" id="portmone_pays" class="btn btn-primary mb-2" value="СПЛАТИТИ">
                                    </form>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Платіжна система Liqpay.ua</h2>
							<!-- Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<div class="row justify-content-md-center">
								<div class="col col-lg-3"><img style="width: 150px;" class="p-2 bg-light" src="img/liqpay.png" id="icon" alt="ipay" /></div>
								<div class="col-md-auto text-white">
								  Захищений платіж – Ваша гарантія безпеки при сплаті в інтернет-магазині на чекауті LiqPay. Ми зарахуємо компанії кошти по платежу як тільки Ви підтвердите отримання послуги чи товара в персональному кабінеті LiqPay.
                                </div>
								</div>
								<!-- Icon -->
								<div class="text-center form_right">
								    <form class="form-inline">
									<div class="form-group mx-sm-3 mb-2">
									  <input type="text" id="liqpay_cash" class="transparent_" name="liqpay_cash" placeholder="сума">
									</div>
                                      <!--<input type="text" id="login" class="third" name="login" placeholder="логін">-->
                                      <input type="submit" id="liqpay_pays" class="btn btn-primary mb-2" value="СПЛАТИТИ">
                                    </form>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>					
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Платіжна система iPay.ua</h2>
							<!-- Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<div class="row justify-content-md-center">
								<div class="col col-lg-3"><img style="width: 100px;" class="p-2 bg-light" src="img/logo_ipay.gif" id="icon" alt="ipay" /></div>
								<div class="col-md-auto text-white">Всеукраїнський сервіс приймання платежів в Інтернеті iPay.ua</div>
								</div>
								<!-- Icon -->
								<div class="text-center form_right">
								<!--<i id="ipay_pay">СПЛАТИТИ</i>-->
								<a href="https://www.ipay.ua/ru/bills/oplata-faust-kiev" class="btn btn-primary" role="button" target="_blank">СПЛАТИТИ</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-12">
						<!-- Ui Item -->
						<div class="ui-item bg-oblue">
							<!-- Heading -->
							<h2>Платіжна система Приват24</h2>
							<!-- Item inner -->
							<div class="ui-item-inner">
								<!-- Number -->
								<div class="row justify-content-md-center">
								<div class="col col-lg-3"><img style="width: 150px;" class="p-2 bg-light" src="img/privat.png" id="icon" alt="ipay" /></div>
								<div class="col-md-auto text-white">
								  ПриватБанк є одним з найінноваційніших банків світу. Наприклад, більш як десять років тому банк став одним з перших в світі, що почав використовувати одноразові SMS-паролі. До останніх інновацій, що отримали визнання в цілому світі, відносяться такі продукти, як платіжний міні-термінал, вхід у Інтернет-банкінг через QR-код, онлайн-інкасація, а також десятки різних мобільних додатків.
                                </div>
								</div>
								<!-- Icon -->
								<div class="text-center form_right">
								<!--<i id="privat24_pay">СПЛАТИТИ</i>-->
                                <a href='https://next.privat24.ua/payments/form/{"token":"008d6e3e-b20a-4f85-9378-95aecd8cf595"}' class="btn btn-primary" role="button" target="_blank">СПЛАТИТИ</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>					
				</div>
			</div>
		</div>

</div>
</div>