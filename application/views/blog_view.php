<H1>Welcome to the Blog</H1>

<?php if ($query->num_rows() > 0): ?>

    <?php foreach($query->result() as $row): ?>

    <p><?=$row->title?></p>
    <p><?=$row->body?></p>
    

    <p><?=anchor('BlogPostController/blogs/' .$row->id, 'blogs');?></p>

    <hr>

    <?php endforeach; ?>
<?php endif; ?>

<p><?=anchor('BlogPostController', 'Back to Blogs');?></p>
</br>
<p><?=anchor('BlogPostController/create_blog/', 'Post a new Blog');?></p>

