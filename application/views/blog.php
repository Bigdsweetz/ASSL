<H1>Welcome to the Blog</H1>

<?php foreach($query->result() as $row): ?>

<h3><?=$row->title?></h3>
<p><?=$row->body?></p>

<p><?=anchor('BlogController/comments/' .$row->id, 'Comments');?></p>

<hr>



<?php endforeach; ?>