<H1>Welcome to the Blog</H1>

<?=form_open('blogcontroller/comment_insert');?>

<?=form_hidden('entry_id', $this->uri->segment(3)) ;?>


<p><textarea name="body" rows="10"</textarea></p>
<p><input type="text" name="author" /></p>

<p><input type ="submit" value="Submit Comment" /></p>


<?php endforeach; ?>

</form>