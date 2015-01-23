<H1>Create a Blog</H1>

<?php foreach($query->result() as $row): ?>

<h3><?=$row->title?></h3>
<p><?=$row->body?></p>

<p><?=anchor('BlogPostController/blogs/' .$row->id, 'blogs');?></p>

<hr>



<?php endforeach; ?>