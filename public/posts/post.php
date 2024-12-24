<?php
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

foreach($posts as $post){
   include '../../components/posts/post.php';
}