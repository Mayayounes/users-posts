<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
include '../../load.php';
// Super Global Array $_GET
$id = $_GET['id'];

$qry = "SELECT * FROM `pst_users` WHERE `id` = '$id';";


$qry_posts = "SELECT * FROM `pst_posts` WHERE `user_id` = '$id';";

$res = $db->query($qry);

$res_posts = $db->query($qry_posts);

// $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
// $user = mysqli_fetch_assoc($res);
$user = mysqli_fetch_object($res);
$posts = mysqli_fetch_all($res_posts, MYSQLI_ASSOC);

// dd($posts);
// dd($user->name);
?>
<h2 class="text-center"><?=$user->name?>'s Posts</h2>
<?php
foreach($posts as $post){
   include '../posts/post.php';
}
?>   
</body>
</html>
