<?php
if (!isset($_POST['SHOPORDERNUMBER'])) 
{ die ("Нечего тут просто так лазить"); }
else
{
$pay_billid=$_POST['SHOPBILLID'];
$pay_ordernumber=$_POST['SHOPORDERNUMBER'];
$pay_approvalcode=$_POST['APPROVALCODE'];
$pay_bill_amount=$_POST['BILL_AMOUNT'];
$pay_token=$_POST['TOKEN'];
$pay_result=$_POST['RESULT'];
$pay_card=$_POST['CARD_MASK'];
$pay_at1=$_POST['ATTRIBUTE1'];
$pay_at2=$_POST['ATTRIBUTE2'];
$pay_at3=$_POST['ATTRIBUTE3'];
$pay_at4=$_POST['ATTRIBUTE4'];
$pay_url=$_POST['RECEIPT_URL'];
$pay_lang=$_POST['LANG'];
$pay_desc=$_POST['DESCRIPTION'];
$pay_ipstoken=$_POST['IPSTOKEN'];
$pay_error_code=$_POST['ERRORIPSCODE'];
$pay_error_msg=$_POST['ERRORIPSMESSAGE'];
}
echo $pay_ordernumber."<br>";
echo $pay_bill_amount."<br>";
echo $pay_result."<br>";
echo $pay_card."<br>";
echo $pay_desc."<br>";
?>