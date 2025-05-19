<?php
include 'dbconnect.php';

if($_POST) {
  $product_id = $_POST['product_id'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];

  $sql = "UPDATE cart SET quantity = '$quantity', price = '$price' WHERE product_name = '$product_id'";
  if ($conn->query($sql) === TRUE) {
    echo "Cart updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
