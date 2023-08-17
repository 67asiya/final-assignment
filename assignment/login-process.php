<?php 

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = mysqli_connect('localhost', 'root', '', 'assignment_priya');
    $sql = "SELECT * FROM user WHERE username='{$username}' and password='{$password}';";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) != 1){
        header('location: login.php');
        exit();
    }

    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 'admin'){
        header('location: verify-transection.php');
        exit();
    }
    else{
        header('location: add-transection.php');
        exit();
    }


?>