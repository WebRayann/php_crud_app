<?php
session_start();
include 'header.php';
include 'navbar.php';
include 'uuid.php';
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
    $id = guidv4();

    $sql = 'INSERT INTO users(id,title,firstname,initial,middle,lastname,gender,birth_date,preffered_contact_address,street,street_line_2,city,region,zipcode,country,phone_number,mobile_number,email) VALUES(:id,:title,:firstname,:initial,:middle,:lastname,:gender,:birth,:pcontact,:street,:streetL2,:city,:region,:zip,:country,:phonenumber,:mobilenumber,:email)';
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
    if($query){
      $_SESSION['status'] = "Record Created Successfully";
    }else{
      echo "Somthing Is Wrong";
    }

}

if(!isset($_SESSION['username'])){
  header('Location: login.php');
}
?>


<title>Create Record</title>
<body>
    <div class="container p-5">
      <?php
      if(isset($_SESSION['status'])){
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['status']; ?>
          </div>
        <?php
        unset($_SESSION['status']);
      }
      ?>
        <form action="" method="POST">
            <div class="row">
                <h4>Name</h4>
                <hr class="hr">
                <div class="col-md-3">
                    <label for="inputState">Title</label>
                    <select id="inputState" class="form-control" id="validationCustom03" name="title" required>
                      <option selected>Choose...</option>
                      <option value="Mr">Mr</option>
                      <option value="Ms">Ms</option>
                      <option value="Miss">Miss</option>
                      <option value="Mrs">Mrs</option>
                    </select>
                  </div>
              <div class="col-md-6">
                <label>First</label>
                <input type="text" class="form-control" id="validationCustom03" name="first" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <div class="col-md-3">
                <label>Initials</label>
                <input type="text" class="form-control" id="validationCustom03" name="initial" required >
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Middle</label>
                    <input type="text" class="form-control" id="validationCustom03" name="middle" required>
                </div>
                <div class="col-md-6">
                    <label>Last</label>
                    <input type="text" class="form-control" id="validationCustom03" name="last" required>
                </div>
            </div>
            <div class="row mt-3">
                <h4>Gender</h4>
                <hr class="hr">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="Mail" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Mail
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="Femail" id="flexRadioDefault2" checked>
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
                    <input class="form-control" type="text" name="birth">
                </div>
            </div>

            <div class="row mt-3">
                <h4>Preferred Contact Address</h4>
                <hr class="hr">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contact" id="exampleRadios1" value="Home" checked>
                  <label class="form-check-label" for="exampleRadios1">
                    Home
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contact" id="exampleRadios2" value="Work">
                  <label class="form-check-label" for="exampleRadios2">
                    Work
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contact" id="exampleRadios3" value="Other">
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
                    <input type="text" class="form-control" name="street">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Street Line 2</label>
                    <input type="text" class="form-control" name="streetLine2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="col-md-3">
                    <label for="">Region</label>
                    <input type="text" class="form-control" name="region">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Postal/Zip Code</label>
                    <input type="text" class="form-control" name="zip">
                </div>
                <div class="col-md-3">
                    <!-- Using Js To Create Country List -->
                    <label for="">Country</label>
                    <input type="text" class="form-control" name="country">
                </div>
            </div>
            <div class="row mt-3">
                <h4>Contact</h4>
                <hr class="hr">
                <div class="col-md-6">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber">
                </div>
                <div class="col-md-6">
                    <label for="">Mobile Number</label>
                    <input type="text" class="form-control" name="mobileNumber">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg mt-3">Submit</button>
          </form>

    <script src="bootstrap.min.js"></script>
</body>