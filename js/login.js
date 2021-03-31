$( document ).ready(function() {
    $(document).on('click', '#ok', function(e) {
			sendAjaxForm('result_form', 'ajax_form', 'check.php');
			return false; 
	});
});
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = $.parseJSON(response);
			//console.log(response);
			lgs = $("#login").val();
			lgs =lgs.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			if (lgs=='') {
			  $('#ErrorMsg').html('Логін не може бути порожній !');
			  $('#error_modal').modal('show');				
			} else if (result.check == 5) {
			  location.replace('main.php?dl=0&lg='+lgs+'&pp='+result.pp+'&id='+result.id+'#info');
			} else if (result.check == 2) { 
			  $('#ErrorMsg').html('Невірний логін або пароль !');
			  $('#error_modal').modal('show');
            } else if (result.check == 6) { 
			  $('#ErrorMsg').html('Невірний пароль !');
			  $('#error_modal').modal('show');
            } else if (result.check == 3) {				
			  $('#ErrorMsg').html('Такого логіна не існує !');
			  $('#error_modal').modal('show');
            }
    	},
    	error: function(response) { // Данные не отправлены
            $('#ErrorMsg').html('Помилка запиту до сервера !');
			$('#error_modal').modal('show');
    	}
 	});
}