<h1>Storing post.....</h1>

<?php
include '../../load.php';


// Save the post data into a variable named old for later use
$old = $_POST;

// Save a copy of the post data to validate
$data = $_POST;

// Create an empty array named erros, to store any found errors
$errors = [];

//ID validation
if($data['user_id'] == ''){
    $errors['user_id_err'] = 'please enter your ID!';
}
elseif(!(preg_match('/[0-9]{1,}/', $data['user_id'] ))){
    $errors['user_id_err'] = 'ID should contain numbers';
}

// title validation
if ($data['title'] === '') {
    $errors['title_err'] = 'Title is required!';
} elseif (strlen($data['title']) < 3) {
    $errors['title_err'] = 'Title should be more than 3 letters!';
} elseif (strlen($data['title']) > 30) {
    $errors['title_err'] = 'Title should be less than or equals 30 letters!';
}

if (count($errors) > 0) {
    // We have erros

    // Save the old data into session
    $_SESSION['old'] = $old;
    // Save the errors data into session
    $_SESSION['errors'] = $errors;
    // redirect back to the create form
    header('location: create.php');

} else {
    // We do not have erros
    // Save the post to Database
    $id = $data['user_id'];
    $title = $data['title'];
    $body = $data['body'];
    $timestamp = date('Y-m-d h:i:s');
    $qry = "INSERT INTO `pst_posts` (`title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES ('$title' , '$body' , '$id' , '$timestamp' , '$timestamp');";
    if($db ->query($qry)){
        $id = $db ->insert_id;
        $_SESSION['success'] = 'post created Successfully';
        header("location: /posts/post.php?id=$id");
    }else{
        //error in executing query
        $_SESSION['save_error'] = 'Cannot Add post';
        header('location: create.php');
        }
}