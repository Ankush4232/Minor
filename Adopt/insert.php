<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $image_name = $_POST["image_name"];
  $name = $_POST["name"];
  $age = $_POST["age"];
  $category = $_POST["category"];
  $breed = $_POST["breed"];
  $gender = $_POST["gender"];

  $sql = "INSERT INTO animals (image_name, name, age, category, breed, gender) 
          VALUES ('$image_name', '$name', '$age', '$category', '$breed', '$gender')";

  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    echo "<script>alert('New record created successfully'); window.location.href='http://localhost/project/Adopt/retrieve.php';</script>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
