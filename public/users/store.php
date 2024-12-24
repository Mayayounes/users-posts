<h1>Storing user.....</h1>

<?php
include '../../load.php';


// Save the post data into a variable named old for later use
$old = $_POST;

// Save a copy of the post data to validate
$data = $_POST;

// Create an empty array named erros, to store any found errors
$errors = [];


// email validation
if ($data['email'] === '') {
    $errors['email_err'] = 'Email is required!';
} elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    $errors['email_err'] = 'Invalid Email!';
}

// password validation
if($data['password']=== ''){
    $errors['password_err'] = 'Please enter your password';
}elseif(strlen($data['password']) < 4){
    $errors['password_err'] = 'password should contains at least 4 characters';
}
elseif(preg_match('/(?=.*[A-Z])(?=.*[a-z])/', $data['password'])){
    $errors['password_err'] = 'password should contains upper cases and lower cases';
}

//confirm password validation
if(!($data['password_confirmation'] === $data['password'])){
    $errors['password_confirmation_err'] = 'Password confirmation did not match!';
}
// first_name validation
if ($data['first_name'] === '') {
    $errors['first_name_err'] = 'First name is required!';
} elseif (strlen($data['first_name']) < 3) {
    $errors['first_name_err'] = 'First name should be more than 3 letters!';
} elseif (strlen($data['first_name']) > 15) {
    $errors['first_name_err'] = 'First name should be less than or equals 15 letters!';
}    

// last_name validation
if ($data['last_name'] === '') {
    $errors['last_name_err'] = 'Last name is required!';
} elseif (strlen($data['last_name']) < 3) {
    $errors['last_name_err'] = 'Last name should be more than 3 letters!';
} elseif (strlen($data['last_name']) > 30) {
    $errors['last_name_err'] = 'Last name should be less than or equals 30 letters!';
}    


// mobile validation
if($data['mobile'] == ''){
    $errors['mobile_err'] = 'Please enter your mobile number';
} elseif ((strlen($data['mobile']) < 11)||(preg_match('/^01[0125]\d{8}#$/' , $data['mobile']))){
    $errors['mobile_err'] = 'Invalid mobile number!';
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
    $name = $data['first_name'] .' ' . $data['last_name'];
    $email= $data['email'];
    $mobile = $data['mobile'];
    $password= password_hash($data['password'], PASSWORD_DEFAULT);
    $role = 'Guest';
    $timestamp = date('Y-m-d h:i:s');
    //insert user into database
    $qry = "INSERT INTO `pst_users` (`name`, `email`, `mobile`, `password`, `roles`, `created_at`, `updated_at`) VALUES ('$name','$email','$mobile','$password','$role','$timestamp','$timestamp')";
    if($db -> query($qry)){
        $id = $db ->insert_id;
        $_SESSION['success'] = 'User created Successfully';
        header("location: /users/user.php?id=$id");
    }else{
        //error in executing query
        $_SESSION['save_error'] = 'Cannot Add user';
        header('location: create.php');
        }
}