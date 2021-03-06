<?php 
require('sql.php');
$sql = new sql();
if(isset($_POST['name'])) {
  $name = $_POST['name'];
  $parentName = $_POST['parentName'];
  $adress = $_POST['adress'];
  $adressTwo = $_POST['adressTwo'];
  $email = $_POST['email'];
  $parentEmail = $_POST['parentEmail'];
  $phone = $_POST['phone'];
  $parentPhone = $_POST['parentPhone'];
  $birthdate = $_POST['birthdate'];
  $youthcenter = $_POST['youthcenter'];
  $gender = $_POST['gender'];
  if ($_POST['age'] == false) {
    if(($name != '') && ($parentName != '') && ($adress != '') && ($email != '') && ($parentEmail != '') && ($phone != '') && ($parentPhone != '') && ($birthdate != '')) {
      $sql->set("INSERT INTO medlemmar (name, parentName, adress, adressTwo, email, parentEmail, phone, parentPhone, birthdate, youthcenter, gender) VALUES(\"". $name."\", \"". $parentName."\", \"". $adress."\", \"". $adressTwo."\", \"". $email."\", \"". $parentEmail."\", \"". $phone."\", \"". $parentPhone."\", \"". $birthdate."\", \"". $youthcenter."\", \"". $gender."\"); ");
      echo"<div class=\"text-center white-text\">Du är nu registrerad</div>";
    }
  } else {
    if(($name != '') && ($adress != '') && ($email != '') && ($phone != '') && ($birthdate != '')) {
      $sql->set("INSERT INTO medlemmar (name, adress, email, phone, birthdate, youthcenter, gender) VALUES(\"". $name."\", \"". $adress."\", \"". $email."\", \"". $phone."\", \"". $birthdate."\", \"". $youthcenter."\", \"". $gender."\"); ");
      echo"<div class=\"text-center white-text\">Du är nu registrerad</div>";
    }
  }
}


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KFGF | Medlems registrering</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

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
    <a href="index.php"><b>KFGF</b>Registrering</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Registrera en ny Medlem</p>

    <form action="register2.php" method="post">

      <div class="form-group has-feedback">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox" name="age" id="ageCheck" clas="ageCheck"> Användaren är 18 eller äldre
          </label>
        </div>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Namn" name="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback parentInfo" >
        <input type="text" class="form-control" placeholder="Föräldrars namn" name="parentName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback parentInfo" >
        <input type="email" class="form-control" placeholder="Föräldrars Email" name="parentEmail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="adress" class="form-control" placeholder="Adress" name="adress">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback parentInfo" >
        <input type="adress" class="form-control" placeholder="Adress 2" name="adressTwo">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="phone" placeholder="Telefonnummer" name="phone">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback parentInfo" >
        <input type="text" class="form-control" id="parentPhone" placeholder="Föräldrars Telefonnummer" name="parentPhone">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label for="">(YYYY/MM/DD/XXXX)</label>
        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Födelsedatum">
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label for="">Fritidsgård</label>
        <select class="selectpicker form-control" name="youthcenter"> 
          <option>Barbacka</option>
          <option>Degeberga</option>
          <option>Fjälkinge</option>
          <option>Näsby</option>
          <option>Slottet</option>
          <option>Tollarp</option>
          <option>Tullen</option>
          <option>Vilan</option>
          <option>Åhus</option>
          <option>Öllsjö</option>
          <option>Österäng</option>
        </select>
      </div>

      <div class="form-group has-feedback">
        <label for="">Kön</label>
        <select class="selectpicker form-control" name="gender">
          <option>Man</option>
          <option>Kvinna</option>
          <option>Annat</option>
        </select>
      </div>

      <div class="row">
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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- jquery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script> -->


<script>
  $("#phone").mask('000-000 00 00');
</script>

<script>
  $("#parentPhone").mask('000-000 00 00');
</script>

<script>
  $("#birthdate").mask('0000/00/00-0000');
</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

$('input').on('ifChecked', function (event){
  $(".parentInfo").fadeOut('medium');
});
$('input').on('ifUnchecked', function (event) {
    $(".parentInfo").fadeIn('medium');
});

</script>
</body>
</html>
