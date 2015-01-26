<H1>Welcome to the Blog</H1>

<?php if ($query->num_rows() > 0): ?>

    <?php foreach($query->result() as $row): ?>

    <p><?=$row->body?></p>
    <p><?=$row->author?></p>


    <p><?=anchor('BlogController/comments/' .$row->id, 'Comments');?></p>

    <hr>

    <?php endforeach; ?>
<?php endif; ?>

<p><?=anchor('BlogController', 'Back to Blog');?></p>
</br>




<?=form_open('BlogController/comment_insert');?>

<?=form_hidden('entry_id', $this->uri->segment(3)) ;?>


<p><textarea name="body" rows="10"></textarea></p>

<p><input type="text" name="author" /></p>

<p><input type ="submit" value="Submit Comment" /></p>

