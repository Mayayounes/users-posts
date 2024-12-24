<?php
include '../../load.php';
?>
<div>
    <a href="posts/create.php">
        <Button class="p-3 text-2xl border border-white rounded-full bg-green-300 text-white w-screen">Add new post</Button>
    </a>
</div>
<?php
$qry = 'SELECT * FROM `pst_posts`;';

$res = $db ->query($qry);

$posts = mysqli_fetch_all($res , 1);

// dd($posts);

foreach($posts as $post){
    include '../../components/posts/post.php';
}