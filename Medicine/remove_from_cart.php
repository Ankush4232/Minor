<?php
include 'dbconnect.php';

if($_POST) {
  $id = $_POST['id'];

  $secret_key = '12345678'; 
  $iv = '1234567812345678'; 
  $encrypted_uid = $_GET['uid'];
  $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);


  $sql = "DELETE FROM cart$uid WHERE id = '$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Product removed from cart successfully!";

    header("Location: cart.php?uid=$encrypted_uid");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
