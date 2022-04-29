<?php
session_start();

if (!isset($_SESSION['a_id'])) {
  header('location:login.php');
}

include('header.php');
include('../FunctionDB.php');
$db = new Database();
$result = mysqli_query($db->conn, "SELECT doctor_tbl.*, speciality_tbl.* FROM doctor_tbl INNER JOIN speciality_tbl
ON speciality_tbl.SpecialityID=doctor_tbl.DoctorSpecialization");
?>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered table-striped table-responsive">
      <thead>
        <tr>
          <th>Doctor Id</th>
          <th>Doctor Name</th>
          <th>Doctor email</th>
          <th>Doctor number</th>
          <th>Doctor address</th>
          <th>Doctor qualification</th>
          <th>Doctor password</th>
          <th>Doctor's specialization</th>
          <th>Doctor City</th>
          <th>Doctor image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>

            <td><?php echo $row['DoctorID']; ?></td>
            <td><?php echo $row['DoctorName']; ?></td>
            <td><?php echo $row['DoctorEmail']; ?></td>
            <td><?php echo $row['DoctorConatct']; ?></td>
            <td><?php echo $row['DoctorAddress']; ?></td>
            <td><?php echo $row['DoctorQualification']; ?></td>
            <td><?php echo $row['DoctorPassword']; ?></td>
            <td><?php echo $row['SpecialityName']; ?></td>
            <td><?php echo $row['DoctorCity']; ?></td>
            <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['DoctorImage']); ?>" width="120px" height="150px" /></td>
            <td>
              <a href="edit_doctors.php?id=<?php echo $row[0]; ?>"><i class="fas fa-edit fa-lg"></i></a>
              <a href="delete_doctor.php?id=<?php echo $row[0]; ?>"><i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
            </td>


          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php
include('footer.php');
?>