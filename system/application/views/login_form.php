<?php $this->load->view('includes/header'); ?>

<div id="login_form" onmouseover="classname">

	<h1>Login Form</h1>
    <?php 
	echo form_open('elearning/validate_credentials');
	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Login');
	echo anchor('elearning/signup', 'Create Account');
	echo form_close();
	?>

</div><!-- end login_form-->

	
<?php $this->load->view('includes/footer'); ?>