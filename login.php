<?php
session_start();
include 'header.php';
include 'navbar.php';
require_once('config.php');

if(isset($_POST['username']) && !empty($_POST['password'])){
    $username = strip_tags($_POST['username']);
    $pass = strip_tags($_POST['password']);
    $sql = 'SELECT * FROM `admins` WHERE `username`=:username AND `pass`=:pass';

    $query = $pdo->prepare($sql);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':pass', $pass, PDO::PARAM_STR);

    $query->execute();

    $count = $query->rowCount();
    if($count > 0){
        $_SESSION['username'] = $_POST['username'];
        header('Location: login_suc.php');
    }else{
        $msg = "Username Or Password is Invalid";
    }

}
?>
<title>Login Page</title>
<div class="container p-5">
<form action="" method="POST" style="max-width:240px;margin:auto;">
    <img src="img/login.png" alt="" style="width:75%;margin-left:20px">
<?php if(isset($msg)){
        echo '<div class="alert alert-danger" role="alert">
        Username Or Password Incorrect!
      </div>';
    } ?>
    <input type="text" class="form-control mt-3" placeholder="Email / Username" name="username">
    <input type="password" class="form-control mt-2" placeholder="Password" name="password">
    <button type="submit" class="btn btn-primary form-control mt-2">Login</button>
    </form>    
</div>