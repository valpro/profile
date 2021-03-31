<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html lang="ru">
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script  src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/profile.js"></script>
<script src="https://www.portmone.com.ua/r3/resources/pg/js/asset/pg.min.js?v=15092019"></script>
<script src="data/data.json"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="../site/new/fontawesome/css/all.min.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">

</head>
<body>
<div class="preloader">Загружаю...</div>
<div class="container-fluid" style="padding-right: 5px; padding-left: 5px;">
<nav id="mainNav">
  <ul id="menu">
    <li><a class="active" href="info.php"><i class="fas fa-house-user"></i><br />Основна</a></li>
    <li><a href="payhistory.php"><i class="fas fa-file-invoice-dollar"></i><br />Історія</a></li>
    <li><a href="pay.php"><i class="fab fa-cc-visa"></i><br />Сплатити</a></li>
    <li><a href="exit.php"><i class="fas fa-sign-out-alt"></i><br />Вихід</a></li>
    <!--<li><a href="chat.php"><i class="fas fa-comments"></i><br />Зв'язок</a></li>-->
  </ul><div class="clr"></div>
</nav>
<div class="container c_width_75">
<div id="ajax-wrap">

<!--ОСНОВНОЙ БЛОК-->

</div>
</div>
</div>
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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрити</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
</body>
</html>