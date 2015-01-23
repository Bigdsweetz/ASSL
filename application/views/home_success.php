<!-- this is the user home page -->
<H1>Welcome User, you have signed in</H1>

<!--php echo $error; //this php tag is giving me errors-->

<?php echo form_open_multipart('upload/do_upload');?>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>


<a href='#'>Log out</a>