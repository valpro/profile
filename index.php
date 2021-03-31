<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html lang="ru">
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script  src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="../site/new/fontawesome/css/all.min.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">

</head>
<body class="bk-color2">

<div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="first">
      <img class="mt-3" src="https://faust.net.ua/images/logo.png" id="icon" alt="FAUST LTD." />
      <h2 class="h_color">Особистий кабінет</h2>
    </div>

    <!-- Login Form -->
    <form id="ajax_form">
      <input type="text" id="login" class="second" name="login" placeholder="логін">
      <input type="text" id="password" class="third" name="password" placeholder="пароль">
      <input type="submit" id="ok" class="fourth" value="ВХІД">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="https://faust.net.ua/">faust.net.ua</a>
    </div>

  </div>
</div>

<!--<div id="result_form"></div>-->
<!-- Modal -->
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