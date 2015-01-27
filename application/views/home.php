<!-- this is the user home page -->
<H1>Welcome User, you have signed in</H1>

<div style='width: 128px; height: <?php echo $size[1]; ?>px; margin-bottom: 10px; border: solid 1px #ccc; background: url("http://thc.fiu.edu/uploads/<?php echo $thumb; ?>");'/>
<?php $size = getimagesize("http://www.yourwebsite.com/uploads/".$thumb); ?>
<a href="/profile/picture" class='editprofile' style="display: block; width: 128px; height: <?php echo $size[1]; ?>px">&nbsp;</a>
</div>


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