<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$product_name = $_POST['product_name'];
$product_detail = $_POST['product_detail'];
$actual_price = $_POST['actual_price'];
$sell_price = $_POST['sell_price'];
$discount = $_POST['discount'];
$highlight1 = $_POST['highlight1'];
$highlight2 = $_POST['highlight2'];
$highlight3 = $_POST['highlight3'];
$highlight4 = $_POST['highlight4'];
$image_name = $_POST['image_name'];

$sql = "INSERT INTO products (product_name, product_detail, actual_price, sell_price, discount, highlight1, highlight2, highlight3, highlight4,image_name)
VALUES ('$product_name', '$product_detail', '$actual_price', '$sell_price', '$discount', '$highlight1', '$highlight2', '$highlight3', '$highlight4','$image_name')";

if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
    echo "<script>alert('Signup successful!'); window.location.href='http://localhost/Medicien/retrieve_data.php';</script>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
