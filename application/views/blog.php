<H1>Welcome to the Blog</H1>

<?php foreach($query->result() as $row): ?>

<h3><?=$row->title?></h3>
<p><?=$row->title?></p>

<p><?=anchor('blog/comments/' .$row->id, 'Comments');?></p>


<?php endforeach; ?>