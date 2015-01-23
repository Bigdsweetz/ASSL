<H1>Welcome to the Blog</H1>

<?php if ($query->num_rows() > 0): ?>

    <?php foreach($query->result() as $row): ?>

    <p><?=$row->title?></p>
    <p><?=$row->body?></p>
    

    <p><?=anchor('BlogPostController/blogs/' .$row->id, 'blogs');?></p>

    <hr>

    <?php endforeach; ?>
<?php endif; ?>

<p><?=anchor('BlogController', 'Back to comments');?></p>
</br>
<p><?=anchor('BlogPostController', 'Post a new Blog');?></p>



<?=form_open('BlogPostController/blog_insert');?>


<p><textarea name="body" rows="10"></textarea></p>

<p><input type="text" name="title" /></p>

<p><input type ="submit" value="Submit blog" /></p>

