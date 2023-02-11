<?php
session_start();
include 'header.php';
include 'navbar.php';
include('pagination.php');
require_once('config.php');

if(!isset($_SESSION['username'])){
  header('Location: login.php');
}
?>
<title>Home</title>
<body class="bg-light">
    <div class="container p-5">
        <a type="button" href="create.php" style="border-radius: 5px;" class="btn btn-outline-warning btn-lg mb-4"><i class="fa fa-plus-square" aria-hidden="true"></i> ADD RECORD</a>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Gender</th>
                <th scope="col">Birth</th>
                <th scope="col">Contact</th>
                <th scope="col">Street</th>
                <th scope="col">StreetL2</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Zip</th>
                <th scope="col">Country</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Function</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $item) {
                  ?>
              <tr>
                <td><?= $item['firstname'] ?></td>
                <td><?= $item['lastname'] ?></td>
                <td><?= $item['gender'] ?></td>
                <td><?= $item['birth_date'] ?></td>
                <td><?= $item['preffered_contact_address'] ?></td>
                <td><?= $item['street'] ?></td>
                <td><?= $item['street_line_2'] ?></td>
                <td><?= $item['city'] ?></td>
                <td><?= $item['region'] ?></td>
                <td><?= $item['zipcode'] ?></td>
                <td><?= $item['country'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['created'] ?></td>
                <td><a type="button" href="read.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary m-1"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                <a type="button" href="update.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a type="button" href="delete.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-danger m-1"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
          <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item <?= ($currentPage == 1)? "disabled": "" ?>"><a class="page-link" href="index.php?page=<?= $currentPage - 1 ?>">Previous</a></li>
                <?php for($page=1;$page<=$pages;$page++): ?>
                <li class="page-item <?=($currentPage == $page) ? "active" : "" ?>"><a class="page-link" href="index.php?page=<?= $page ?>"><?= $page ?></a></li>
                <?php endfor ?>
                <li class="page-item <?=($currentPage == $pages) ? "disabled" : "" ?> "><a class="page-link" href="index.php?page=<?= $currentPage + 1 ?>">Next</a></li>
              </ul>
            </nav>
              </div>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>