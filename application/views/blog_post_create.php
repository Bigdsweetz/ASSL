<center><H1>Creating a Blog</H1></center>

<?=form_open('blogpostcontroller/blog_insert');?>


<p><textarea name="body" rows="10"></textarea></p>

<p><input type="text" name="title" /></p>

<p><input type ="submit" value="Submit blog" /></p>


<p><?=anchor('blogpostcontroller', 'Back to Blogs');?></p>

</form>