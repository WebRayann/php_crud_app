<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Login Successfull - ". $_SESSION['username'];
    echo '<br><a href="logout.php">LogOut</a>';
}else{
    echo 'Login Unsuccessfull';
}
?>

<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>

<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>