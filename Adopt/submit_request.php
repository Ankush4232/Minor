
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$appointment_date = $_POST["appointment_date"];
$address = $_POST["address"]; // address
$additional_message = $_POST["message"]; // additional message
$animal_details = $_POST["Animal_details"]; // animal details



$sql = "INSERT INTO adoption_requests (name, email, phone, appointment_date, address, additional_message, animal_details) VALUES ('$name', '$email', '$phone', '$appointment_date', '$address', '$additional_message', '$animal_details')";

if ($conn->query($sql) === TRUE) {
//   echo "Request submitted successfully!";
$encrypted_uid = $_GET['uid'];              //   for  encripted uid 
  echo "<script>alert('Request submitted successfully!'); window.location.href='http://localhost/project/Adopt/index.php?uid=$encrypted_uid';</script>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
