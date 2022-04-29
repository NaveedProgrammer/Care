<?php
session_start();
if (!isset($_SESSION['a_id'])) {
  header('location:login.php');
}

include('../FunctionDB.php');
$db = new Database();

if (isset($_POST['BtnAdd'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['phone'];
  $address = $_POST['address'];
  $qualification = $_POST['qualification'];
  $password = $_POST['password'];
  $specialization = $_POST['specialization'];
  $city = $_POST['city'];
  $image = addslashes(file_get_contents($_FILES['Img']['tmp_name']));

  $db->insert('doctor_tbl', ['DoctorName' => $name, 'DoctorEmail' => $email, 'DoctorConatct' => $number, 'DoctorAddress' => $address, 'DoctorQualification' => $qualification, 'DoctorPassword' => $password, 'DoctorSpecialization' => $specialization,'DoctorCity' => $city, 'DoctorImage' => $image]);

  if ($db->result) {
    echo "<script>alert('Doctor Added!');</script>";
  } else {
    echo mysqli_error($db->conn);
  }
}


include('header.php');

?>

<div class="container">
  <form method="post" enctype="multipart/form-data">

    <div class="row">
      <div class="col-25">
        <label for="lname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="name" placeholder="Enter Doctor Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" placeholder="Enter Dcotor's Email..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Contact Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="phone" placeholder="Enter Doctor's Phone..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="address" placeholder="Enter Doctors's address.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Qualification</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="qualification" placeholder="Enter Doctor's Qualification.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="password" placeholder="Enter Doctor's Password.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Specialization</label>
      </div>
      <div class="col-75">
        <select id="country" name="specialization">
          <option value="0">Select Speciality</option>

          <?php
          $db->select('speciality_tbl', '*');
          while ($row = mysqli_fetch_assoc($db->result)) {

          ?>
            <option value="<?php echo $row['SpecialityID']; ?>">
              <?php echo $row['SpecialityName']; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">City</label>
      </div>
      <div class="col-75">
        <select id="country" name="city">
          <option value="0">Select City</option>

          <?php
          $db->select('city_tbl', '*');
          while ($row = mysqli_fetch_assoc($db->result)) {

          ?>
            <option value="<?php echo $row['CityID']; ?>">
              <?php echo $row['CityName']; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="country">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="lname" name="Img" required>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="BtnAdd">

    </div>
  </form>
</div>
<?php
include('footer.php');
?>