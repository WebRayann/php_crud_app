<?php
require_once('config.php');
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$sql = 'SELECT COUNT(*) AS numberUser FROM `users`;';
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetch();
$numberUser = (int) $result['numberUser'];
$perPage = 5;
$pages = ceil($numberUser / $perPage);
$premier = ($currentPage * $perPage) - $perPage;
$sql = 'SELECT * FROM `users` ORDER BY `created` DESC LIMIT :premier,:perpage;';
$query = $pdo->prepare($sql);
$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':perpage', $perPage, PDO::PARAM_INT);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>