<div class="login-logo">
    <b>Admin</b> Login
  </div>
  <?= $this->Flash->render() ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <!-- <form action="../../index2.html" method="post"> -->
    <?= $this->Form->create($user); ?>
      <div class="form-group has-feedback">
        <?= $this->Form->control('username', ['type'=>'text','class'=>'form-control','placeholder'=>'Username','label'=>false])?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <!-- <input type="password" class="form-control" placeholder="Password"> -->
        <?= $this->Form->control('password', ['type'=>'password','class'=>'form-control','placeholder'=>'Password','label'=>false])?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          
          <?= $this->Form->button(__('Login'),['class'=>'btn btn-primary btn-block btn-flat'])?>

        </div>
        <!-- /.col -->
      </div>
    <?= $this->Form->end();?>

    
  <!-- /.login-box-body -->