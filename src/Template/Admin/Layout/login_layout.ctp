<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php

  echo $this->Html->css("bootstrap.min.css");
  echo $this->Html->css("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css");
  echo $this->Html->css("plugins/ionicons.min.css");
  echo $this->Html->css("plugins/AdminLTE.min.css");
  echo $this->Html->css("plugins/blue.css");


  ?>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
  <?= $this->Flash->render() ?>
    
      <?= $this->fetch('content') ?>
    
  </div>
  <?php
  echo $this->Html->script("plugins/jquery-2.2.3.min.js");
  echo $this->Html->script("bootstrap.min.js");
  echo $this->Html->script("plugins/icheck.min.js");
  ?>
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