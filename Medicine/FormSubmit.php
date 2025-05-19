<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $landmark = $_POST['landmark'];
  $pincode = $_POST['pincode'];
  $pet_name = $_POST['Pet_Name'];
  $pet_type = $_POST['Pet_Type'];
  $pet_age = $_POST['Pet_Age'];
  $appointment_date = $_POST['Appointment_Date'];
  $appointment_time = $_POST['Appointment_time'];
  $checkup_mode = $_POST['checkUP_mode'];
  $problem_summary = $_POST['problem_summary'];
  $user_uid = $_POST['UserUID'];

  $sql = "INSERT INTO appointments (name, mobile, address, city, state, landmark, pincode, pet_name, pet_type, pet_age, appointment_date, appointment_time, checkup_mode, problem_summary, user_uid)
  VALUES ('$name', '$mobile', '$address', '$city', '$state', '$landmark', '$pincode', '$pet_name', '$pet_type', '$pet_age', '$appointment_date', '$appointment_time', '$checkup_mode', '$problem_summary', '$user_uid')";

  if ($conn->query($sql) === TRUE) {
    // echo "Appointment booked successfully!";
    $encrypted_uid = $_GET['uid'];
    echo "<script>alert('Appointment booked successfully!'); window.location.href='http://localhost/project/index2.php?uid=$encrypted_uid';</script>";
   
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
