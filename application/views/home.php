<!-- this is the user home page -->
<H1>Welcome User, you have signed in</H1>

<!--php echo $error; //this php tag is giving me errors-->

<?php echo form_open_multipart('HomeController/do_upload');?>

<?php echo form_label('Upload an image'); ?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />
<br /><br />

<?php echo form_label('Your username is #Username');?>
<br /><br />

<?php echo form_label('Your e-mail addres is #E-mail');?>
<br /><br />
    
<?php echo form_label('Tell us about yourself'); ?>

<p><textarea name="bio" rows="10"></textarea></p>

<p><input type ="submit" value="Save" /></p>
<br /><br />



<?php echo form_label('SIGNATURE goes here');?>

<input type="file" name="userfile" size="20" />

    
    
</form>

<a href='#'>Log out</a>