<H1>Welcome to the Blog</H1>

<?=form_open('blogpostcontroller/blog_insert');?>



<p><input type="text" name="title" /></p>
<p><textarea name="body" rows="10"</textarea></p>

<p><input type ="submit" value="Submit Post" /></p>



<?php endforeach; ?>

</form>