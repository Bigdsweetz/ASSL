<!-- this is the user home page -->
<H1>Welcome User, you have signed in</H1>

<!--php echo $error; //this php tag is giving me errors-->

<?php echo form_open_multipart('HomeController/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

<a href='#'>Log out</a>