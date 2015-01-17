<div class ="center-block">


    <center><h1> Login</h1></center>

<?php echo validation_errors(); ?>

<?php echo form_open('LoginController/checklogin'); ?>

Username: <br/>
<input type='text' name='username'/><br/>

Password: <br/>
<input type='text' name='password'/><br/>

<input type='submit' value='Login' name='submit'/>


</div>