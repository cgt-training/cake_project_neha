<section>
	<div class="col-md-4 col-sm-4 col-xs-12" style="text-align: center">

		<!-- <img src="images/logoBlog.png"/> -->
		<?php echo $this->Html->image("logoBlog.png",array("alt" =>'Logo ', "border" =>'0')); ?>
	</div>

<div class="col-md-8 col-sm-8 col-xs-12">
	  <nav class="navbar navbar-default">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      <li><?= $this->Html->link(__('ARTICLES'), ['controller'=>'Articles','action' => 'index'],['class'=>'navbar-brand']) ?></li>
	      	<li><?= $this->Html->link(__('COMPANIES'), ['controller'=>'Companies','action' => 'index'],['class'=>'navbar-brand']) ?></li>
	      	<li><?= $this->Html->link(__('BRANCHES'), ['controller'=>'Branches','action' => 'index'],['class'=>'navbar-brand']) ?></li>
	        <!-- <li class="active">
		        <?= $this->Html->link(__('USERS'), ['controller'=>'Users','action' => 'index'],['class'=>'navbar-brand']) ?>
		        <span class="sr-only">(current)</span>
	        </li> -->
	        <?php if(!($this->request->session()->check('Auth.User.role')))
	        {
	        	?>
	        <li class="active">
		        <?= $this->Html->link(__('SIGN UP'), ['controller'=>'Users','action' => 'register'],['class'=>'navbar-brand']) ?>
		        <span class="sr-only">(current)</span>
	        </li>
	        <?php }	        ?>
	        
	      	<li><?= $this->Html->link(__('POSTS'), ['controller'=>'Posts','action' => 'index'],['class'=>'navbar-brand']) ?></li>
	        <?php if(!($this->request->session()->check('Auth.User.role')))
	        {
	        	?>
	        	<li><?= $this->Html->link(__('LOGIN'), ['controller'=>'Users','action' => 'login'],['class'=>'navbar-brand']) ?></li>
	        	<?php
		    }
		    else
		    {
		    	?>
		    		<li><?= $this->Html->link(__('LOGOUT'), ['controller'=>'Users','action' => 'logout'],['class'=>'navbar-brand']) ?></li>
		    	<?php
		    }
			?>
	        
	      </ul>
	      
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
</section>
<section>
	<div class="blog-background">
		
	</div>	
</section>
