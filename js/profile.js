$(document).ready(function() {

var url_string = window.location.href;
var url = new URL(url_string);
var dl = url.searchParams.get("dl");
var lg = url.searchParams.get("lg");
var pp = url.searchParams.get("pp");
var id = url.searchParams.get("id");
//var $preloader = $('.preloader');

checkpp(lg,pp);

// Check for hash value in URL
 var hash = window.location.hash.substr(1);
  //if (hash=='pay') { $('body').addClass('bk-color2'); } else { $('body').removeClass('bk-color2'); }
 var href = $('#menu li a').each(function(){
 var href = $(this).attr('href');
 if(hash==href.substr(0,href.length-4)){
 var toLoad = hash+'.php #ajax-wrap';
 $('#menu li a').removeClass('active');
 $(this).addClass('active');
 $('#ajax-wrap').load(toLoad,'dl='+dl+'&lg='+lg+'&pp='+pp)
 } 
 });
 
 $('#menu li a').click(function(){
 this_hash = $(this).attr('href').substr(0,$(this).attr('href').length-4);
 if (this_hash=='exit') { location.replace('index.php'); }
 var toLoad = $(this).attr('href')+' #ajax-wrap';
 $('#menu li a').removeClass('active');
 $(this).addClass('active');
 
 //if (this_hash=='pay') { $('body').addClass('bk-color2'); } else { $('body').removeClass('bk-color2'); }
 
var url_string = window.location.href;
var url = new URL(url_string);
var dl = url.searchParams.get("dl");
var lg = url.searchParams.get("lg");
var pp = url.searchParams.get("pp");
var id = url.searchParams.get("id");

checkpp(lg,pp);
 
 window.location.hash = this_hash;
 $('#ajax-wrap').load(toLoad,'dl='+dl+'&lg='+lg+'&pp='+pp)
 return false;
 
 });

  $(document).on('click', '#credit', function(e) {
	  if ($('#credit').html()!='Працюєте в кредит !') {
	      $('#info_modal').modal('show');
	  }
	  return false;
  });
 
  $(document).on('click', '#pay_out', function(e) {
	$('#info_modal').modal('hide');
    $.ajax({
        url:      "creditpay.php", //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: ({pay:'yes'}),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = $.parseJSON(response);
			//console.log(result);
			if (result) {
				 //console.log(result);
				 $('#credit').html(result);
				 //$('#error_modal').modal('show');
			}
    	},
    	error: function(response) { // Данные не отправлены
            //console.log(result);
			$('#ErrorMsg').html('ERROR !');
			$('#error_modal').modal('show');
    	}
 	});	  
	return false;
  });
  $(document).on('click', '#portmone_pays', function(e) {
	if ($('#portmone_cash').val()<=0) {
		$('#ErrorMsg').html('Сума має бути більшою нуля !');
		$('#error_modal').modal('show');
        $('#portmone_cash').val('');		
	} else {
	 //var invoice = get_invoice(id,$('#cash').val());
	 //console.log(invoice);
	 $.post("invoice.php", { "userid": id, "amount": $('#portmone_cash').val() })
     .done(function(inv) {
	                        data['order'].shopOrderNumber = inv;
                            data['order'].billAmount = $('#portmone_cash').val();
	                        data['order'].description = "Оплата за послуги інтернет абонента " + lg;
                            PG.success(function (data) {
                               console.log(JSON.stringify(data));
                            });
                            PG.paymentData("gateway",data,"frame"); PG.create();
                            PG.openPaymentArea();
							$('#portmone_cash').val('');
	                     });							 
	}
	return false;
  }); 
  $(document).on('click', '#liqpay_pays', function(e) {
	if ($('#liqpay_cash').val()<=0) {
		$('#ErrorMsg').html('Сума має бути більшою нуля !');
		$('#error_modal').modal('show');
        $('#portmone_cash').val('');		
	} else {
						 
	}
	return false;
  });   
});
function checkpp(lg,pp) {
    $.ajax({
        url:      "check.php", //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: ({check:'yes', login:lg, password:pp}),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = $.parseJSON(response);
			//console.log(result);
			if (result && result.check!=5) {
				 location.replace('index.php');
			}
    	},
    	error: function(response) { // Данные не отправлены
		//console.log(response);
            location.replace('index.php');
    	}
 	});
}	
function setAttr(prmName,val){
    var res = '';
	var d = location.href.split("#")[0].split("?");
	var base = d[0];
	var query = d[1];
	if(query) {
		var params = query.split("&");
		for(var i = 0; i < params.length; i++) {
			var keyval = params[i].split("=");
			if(keyval[0] != prmName) {
				res += params[i] + '&';
			}
		}
	}
	res += prmName + '=' + val;
	window.location.href = base + '?' + res;
	return false;
}