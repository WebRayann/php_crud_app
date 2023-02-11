<?php
include 'header.php';
include 'navbar.php';
require_once('config.php');

if (isset($_POST['title']) && !empty($_POST['title'])
   && isset($_POST['first']) && !empty($_POST['first'])
   && isset($_POST['initial']) && !empty($_POST['initial'])
   && isset($_POST['middle']) && !empty($_POST['middle'])
   && isset($_POST['last']) && !empty($_POST['last'])
   && isset($_POST['gender']) && !empty($_POST['gender'])
   && isset($_POST['birth']) && !empty($_POST['birth'])
   && isset($_POST['contact']) && !empty($_POST['contact'])
   && isset($_POST['street']) && !empty($_POST['street'])
   && isset($_POST['streetLine2']) && !empty($_POST['streetLine2'])
   && isset($_POST['city']) && !empty($_POST['city'])
   && isset($_POST['region']) && !empty($_POST['region'])
   && isset($_POST['zip']) && !empty($_POST['zip'])
   && isset($_POST['country']) && !empty($_POST['country'])
   && isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])
   && isset($_POST['mobileNumber']) && !empty($_POST['mobileNumber'])
   && isset($_POST['email']) && !empty($_POST['email'])
){
    $id = strip_tags($_GET['id']);
    $title = strip_tags($_POST['title']);
    $first = strip_tags($_POST['first']);
    $initial = strip_tags($_POST['initial']);
    $middle = strip_tags($_POST['middle']);
    $last = strip_tags($_POST['last']);
    $gender = strip_tags($_POST['gender']);
    $birth = strip_tags($_POST['birth']);
    $contact = strip_tags($_POST['contact']);
    $street = strip_tags($_POST['street']);
    $streetLine2 = strip_tags($_POST['streetLine2']);
    $city = strip_tags($_POST['city']);
    $region = strip_tags($_POST['region']);
    $zip = strip_tags($_POST['zip']);
    $country = strip_tags($_POST['country']);
    $phoneNumber = strip_tags($_POST['phoneNumber']);
    $mobileNumber = strip_tags($_POST['mobileNumber']);
    $email = strip_tags($_POST['email']);

    $sql = 'UPDATE `users` SET `title`=:title,`firstname`=:firstname,`initial`=:initial,`middle`=:middle,`lastname`=:lastname,`gender`=:gender,`birth_date`=:birth,`preffered_contact_address`=:pcontact,`street`=:street,`street_line_2`=:streetL2,`city`=:city,`region`=:region,`zipcode`=:zip,`country`=:country,`phone_number`=:phonenumber,`mobile_number`=:mobilenumber,`email`=:email WHERE `id`=:id;';
    $query = $pdo->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':firstname', $first, PDO::PARAM_STR);
    $query->bindValue(':initial', $initial, PDO::PARAM_STR);
    $query->bindValue(':middle', $middle, PDO::PARAM_STR);
    $query->bindValue(':lastname', $last, PDO::PARAM_STR);
    $query->bindValue(':gender', $gender, PDO::PARAM_STR);
    $query->bindValue(':birth', $birth, PDO::PARAM_STR);
    $query->bindValue(':pcontact', $contact, PDO::PARAM_STR);
    $query->bindValue(':street', $street, PDO::PARAM_STR);
    $query->bindValue(':streetL2', $streetLine2, PDO::PARAM_STR);
    $query->bindValue(':city', $city, PDO::PARAM_STR);
    $query->bindValue(':region', $region, PDO::PARAM_STR);
    $query->bindValue(':zip', $zip, PDO::PARAM_STR);
    $query->bindValue(':country', $country, PDO::PARAM_STR);
    $query->bindValue(':phonenumber', $phoneNumber, PDO::PARAM_STR);
    $query->bindValue(':mobilenumber', $mobileNumber, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);

    $query->execute();
}


if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id`=:id';

    $query = $pdo->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_STR);

    $query->execute();

    $result = $query->fetch();
}

?>
<body>
    <div class="container p-5">
        <form action="" method="POST">
            <div class="row">
                <h4>Name</h4>
                <hr class="hr">
                <div class="col-md-3">
                    <label for="inputState">Title</label>
                    <select id="inputState" class="form-control" id="validationCustom03" name="title" value="<?= $result['title'] ?>" required>
                      <option value="<?= $result['title'] ?>"><?= $result['title'] ?></option>
                      <option value="Mr">Mr</option>
                      <option value="Ms">Ms</option>
                      <option value="Miss">Miss</option>
                      <option value="Mrs">Mrs</option>
                    </select>
                  </div>
              <div class="col-md-6">
                <label>First</label>
                <input type="text" class="form-control" id="validationCustom03" name="first" value="<?= $result['firstname'] ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <div class="col-md-3">
                <label>Initials</label>
                <input type="text" class="form-control" id="validationCustom03" name="initial" value="<?= $result['initial'] ?>" required >
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Middle</label>
                    <input type="text" class="form-control" id="validationCustom03" name="middle" value="<?= $result['middle'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Last</label>
                    <input type="text" class="form-control" id="validationCustom03" name="last" value="<?= $result['lastname'] ?>" required>
                </div>
            </div>
            <div class="row mt-3">
                <h4>Gender</h4>
                <hr class="hr">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="Mail" id="flexRadioDefault1" <?php if ($result['gender'] == "Mail") echo 'checked="checked"' ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Mail
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="Femail" id="flexRadioDefault2" <?php if ($result['gender'] == "Femail") echo 'checked="checked"'?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Femail
                  </label>
                </div>
            </div>

            <div class="row mt-3">
                <h4>Date Of Birth</h4>
                <hr class="hr">
                <div class="col-md-6">
                    <label>Date</label>
                    <input class="form-control" type="text" name="birth" value="<?= $result['birth_date'] ?>" required>
                </div>
            </div>

            <div class="row mt-3">
                <h4>Preferred Contact Address</h4>
                <hr class="hr">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contact" id="exampleRadios1" value="Home" <?php if ($result['preffered_contact_address'] == "Home") echo 'checked="checked"' ?>>
                  <label class="form-check-label" for="exampleRadios1">
                    Home
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contact" id="exampleRadios2" value="Work" <?php if ($result['preffered_contact_address'] == "Work") echo 'checked="checked"' ?>>
                  <label class="form-check-label" for="exampleRadios2">
                    Work
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contact" id="exampleRadios3" value="Other" <?php if ($result['preffered_contact_address'] == "Other") echo 'checked="checked"' ?>>
                  <label class="form-check-label" for="exampleRadios3">
                    Other
                  </label>
                </div>
            </div>
            <div class="row mt-3">
                <h4>Address</h4>
                <hr class="hr">
                <div class="col-md-6">
                    <label for="">Street</label>
                    <input type="text" class="form-control" name="street" value="<?= $result['street'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Street Line 2</label>
                    <input type="text" class="form-control" name="streetLine2" value="<?= $result['street_line_2'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city" value="<?= $result['city'] ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="">Region</label>
                    <input type="text" class="form-control" name="region" value="<?= $result['region'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Postal/Zip Code</label>
                    <input type="text" class="form-control" name="zip" value="<?= $result['zipcode'] ?>" required>
                </div>
                <div class="col-md-3">
                    <!-- Using Js To Create Country List -->
                    <label for="">Country</label>
                    <input type="text" class="form-control" name="country" value="<?= $result['country'] ?>" required>
                </div>
            </div>
            <div class="row mt-3">
                <h4>Contact</h4>
                <hr class="hr">
                <div class="col-md-6">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber" value="<?= $result['phone_number'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="">Mobile Number</label>
                    <input type="text" class="form-control" name="mobileNumber" value="<?= $result['mobile_number'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $result['email'] ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-info btn-lg mt-3">Update</button>
          </form>

    <script src="bootstrap.min.js"></script>
</body>