<?php
require_once('config.php');
include 'header.php';
include 'navbar.php';
include 'uuid.php';

if(isset($_POST['firstname']) && !empty($_POST['firstname'])
   && isset($_POST['lastname']) && !empty($_POST['lastname'])
   && isset($_POST['username']) && !empty($_POST['username'])
   && isset($_POST['email']) && !empty($_POST['email'])
   && isset($_POST['password']) && !empty($_POST['password'])
){
    $firstname = strip_tags($_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']);
    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $pass = strip_tags($_POST['password']);
    $id = guidv4();




    $sql = 'INSERT INTO admins(id,fname,lname,username,email,pass) VALUES(:id,:firstname,:lastname,:username,:email,:pass);';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':pass', $pass, PDO::PARAM_STR);

    $query->execute();

    if($query){
        $_SESSION['status'] = 'User Created Successfully';
    }else{
        echo 'Something Is Wrong';
    }

}



?>


<div class="container p-5">
<form action="" method="POST" style="max-width:240px;margin:auto">
<?php 
    if(isset($_SESSION['status'])): ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['status']; ?>
        </div>
        <?php endif ?>
    <input type="text" class="form-control" placeholder="Name" name="firstname">
    <input type="text" class="form-control mt-2" placeholder="Last" name="lastname">
    <input type="text" class="form-control mt-2" placeholder="Username" name="username">
    <input type="email" class="form-control mt-2" placeholder="Email" name="email">
    <input type="password" class="form-control mt-2" placeholder="Password" name="password">
    <button type="submit" class="btn btn-outline-primary form-control mt-2">Register</button>
</form>
</div>