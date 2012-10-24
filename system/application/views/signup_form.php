<?php $this->load->view('includes/header'); ?>
<style>
a{
   text-decoration:none;
	border:1px inset #f4f4f4;
	cursor:pointer;
	width:80px;
	padding:5px;
	color: #FFF;
	background-color: #F36;
	background-repeat: no-repeat;
	background-position: center center;
}
a:hover{
	/* The submit button */
	color: #FFF;
	background-color:#F00;
}

</style>
<h1>Buat Account Baru!</h1>
<fieldset>
<legend>Data Diri</legend>
<?php
   
echo form_open('login/create_member');

echo form_input('first_name', set_value('first_name', 'First Name'));
echo form_input('last_name', set_value('last_name', 'Last Name'));
echo form_input('email_address', set_value('email_address', 'Email Address'));
?>
</fieldset>

<fieldset>
<legend>Login Info</legend>
<?php
echo form_input('username', set_value('username', 'Username'));
echo form_input('password', set_value('password', 'Password'));
echo form_input('password2', 'Password Confirm');

echo form_submit('submit', 'Create Acccount').
anchor('elearning', 'Cancel');
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>


<?php $this->load->view('includes/footer'); ?>