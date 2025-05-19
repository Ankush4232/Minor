<?php 
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $check_sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($check_sql);

  if ($result->num_rows > 0) {
    echo "<script>alert('Email Already exist!'); window.location.href='http://localhost/project/signup/index.html';</script>";
  } else {
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Signup successful!'); window.location.href='http://localhost/project/login/index.html';</script>";
    } else {
      echo "<script>alert('An error occurred: " . $conn->error . "'); window.location.href='http://localhost/project/signup/index.html';</script>";
    }
  }
}

$conn->close();
?>
