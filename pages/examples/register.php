<?php 
require('../../sql.php');
$sql = new sql();
if(isset($_POST['name'])) {
  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pass = $_POST['pass'];
  $passCheck = $_POST['passCheck'];
  $rank = $_POST['rank'];
  if(($name != '') && ($uname != '') && ($email != '') && ($phone != '') && ($pass != '')) {
    if($pass == $passCheck) {
      $pass = crypt($pass, 'KFGFPass');
      $ok = $sql->get("select * FROM admin WHERE uname = \"". $uname. "\"");
      if(count($ok) == 0) {
        $ok = $sql->get("select * FROM admin WHERE email = \"". $email. "\"");
        if(count($ok) == 0) {
          $ok = $sql->get("select * FROM admin WHERE phone = \"". $phone. "\"");
          if(count($ok) == 0) {
            $ok = $sql->set("INSERT INTO admin (name, uname, email, phone, pass, rank) VALUES(\"". $name."\", \"". $uname."\", \"". $email."\", \"". $phone."\", \"". $pass."\", \"". $rank."\"); ");
            echo"<div class=\"text-center white-text\">Du är nu registrerad</div>";
          } else {
            echo"<div class=\"text-center white-text\">Ditt telefonnummer är redan i användning</div>";
          }
        } else {
          echo"<div class=\"text-center white-text\">Din email är redan i användning</div>";
        }
      } else {
        echo"<div class=\"text-center white-text\">Ditt användarnamn är redan taget</div>";
      }
    } else {
    echo"<div class=\"text-center white-text\"> Ditt lösenord matchar inte </div>";
  }
  } else {
    echo"<div class=\"text-center white-text\">Du måste fylla i alla rutor</div>";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KFGF | Ledar registrering</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>KFGF</b>Registrering</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrera en ny ledare</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Namn" name="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Användarnamn" name="uname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="phone" placeholder="Telefonnummer" name="phone">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Lösenord" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Skriv in lösenord igen" name="passCheck">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label for="">Ranker</label>
        <select class="selectpicker form-control" name="rank">
          <!-- <option>Admin</option> -->
          <option>Verksamhetschef</option>
          <option>Föreståndare</option>
          <option>Fritidsledare</option>
        </select>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Användandet av personuppgifter godkänns enligt <a href="#">GDPR</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrera</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- jquery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

<script>
  $("#phone").mask('000-000 00 00');
</script>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
