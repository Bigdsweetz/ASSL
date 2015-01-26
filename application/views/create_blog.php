<Center><H1>Blog Creationg page</H1></Center>

<?php foreach($query->result() as $row): ?>

<h3><?=$row->title?></h3>
<p><?=$row->body?></p>

<p><?=anchor('BlogPostController/blogs/' .$row->id, 'blogs');?></p>



<hr>



<?php endforeach; ?>

<p><?=anchor('BlogPostController/create_blog/', 'Post a new Blog');?></p>