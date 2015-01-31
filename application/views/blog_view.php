<H1>Welcome to the Blog</H1>

<?php if ($query->num_rows() > 0): ?>

    <?php foreach($query->result() as $row): ?>

    <p><?=$row->title?></p>
    <p><?=$row->body?></p>
    
    <hr>

    <?php endforeach; ?>
<?php endif; ?>

<p><?=anchor('blogpostcontroller', 'Back to Blogs');?></p>
</br>
<p><?=anchor('blogpostcontroller/create_blog/', 'Create a new Blog');?></p>

</form>