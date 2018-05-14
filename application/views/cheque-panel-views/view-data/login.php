<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$this->output->enable_profiler(TRUE);	
?>
<!-- header section -->
<?php $this->load->view(PAGE_HEADER, array('title' => $pageTitle, 'css' => $loginCss)); ?>

<body>
	<div id="wrapper">
		<form name="login-form" class="login-form" action="loginme" method="post">
			<div class="header">
			<h1>Login</h1>
			</div>
			<div class="col-md-12">
	            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>', '</div>'); ?>
	        </div>
	        <?php
	        $error = $this->session->flashdata('error');
	        if($error)
	        {
	            ?>
	           <div class="col-md-12"> 
	            <div class="alert alert-danger alert-dismissable">
	                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	                <?php echo $this->session->flashdata('error'); ?>                    
	            </div>
	           </div> 
	        <?php } ?>
			<div class="content">
				<input name="username" type="text" class="input username" placeholder="Username" autocomplete="off"/>
				<div class="user-icon"></div>
				<input name="password" type="password" class="input password" placeholder="Password" autocomplete="off"/>
				<div class="pass-icon"></div>		
			</div>
			
			<div class="footer">
			<input type="submit" name="submit" value="Login" class="button" />
			</div>
		</form>
		
	</div>
   <div class="gradient"></div>

</body>

</html>