<?php
include 'header.php';
include 'navbar.php';
require_once('config.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * FROM `users` WHERE `id`=:id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
}
?>

<div class="container p-5">
<table class="table table-bordered">
  <tbody>
    <tr>
      <th scope="col">Title</th>
      <td><?= $result['title'] ?></td>
    </tr>
    <tr>
      <th scope="col">First</th>
      <td><?= $result['firstname'] ?></td>
    </tr>
    <tr>
      <th scope="col">Initial</th>
      <td><?= $result['initial'] ?></td>
    </tr>
    <tr>
      <th scope="col">Middle</th>
      <td><?= $result['middle'] ?></td>
    </tr>
    <tr>
      <th scope="col">Last</th>
      <td><?= $result['lastname'] ?></td>
    </tr>
    <tr>
      <th scope="col">Gender</th>
      <td><?= $result['gender'] ?></td>
    </tr>
    <tr>
      <th scope="col">Birth</th>
      <td><?= $result['birth_date'] ?></td>
    </tr>
    <tr>
      <th scope="col">Contact</th>
      <td><?= $result['preffered_contact_address'] ?></td>
    </tr>
    <tr>
      <th scope="col">Street</th>
      <td><?= $result['street'] ?></td>
    </tr>
    <tr>
      <th scope="col">Street Line 2</th>
      <td><?= $result['street_line_2'] ?></td>
    </tr>
    <tr>
      <th scope="col">City</th>
      <td><?= $result['city'] ?></td>
    </tr>
    <tr>
      <th scope="col">Region</th>
      <td><?= $result['region'] ?></td>
    </tr>
    <tr>
      <th scope="col">Zip</th>
      <td><?= $result['zipcode'] ?></td>
    </tr>
    <tr>
      <th scope="col">Country</th>
      <td><?= $result['country'] ?></td>
    </tr>
    <tr>
      <th scope="col">Phone Number</th>
      <td><?= $result['phone_number'] ?></td>
    </tr>
    <tr>
      <th scope="col">Mobile Number</th>
      <td><?= $result['mobile_number'] ?></td>
    </tr>
    <tr>
      <th scope="col">Email</th>
      <td><?= $result['email'] ?></td>
    </tr>
    <tr>
      <th scope="col">Created</th>
      <td><?= $result['created'] ?></td>
    </tr>
  </tbody>
</table>
</div>