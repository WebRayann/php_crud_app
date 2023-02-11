<?php
require_once('config.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);

    $sql = 'DELETE FROM `users` WHERE `id`=:id';

    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();

    if($query){
        $_SESSION['delete'] = "Remove Succesfuuly";
        header('Location: index.php');
    } else{
        echo "Somthing Is Wrong";
    }

}


?>