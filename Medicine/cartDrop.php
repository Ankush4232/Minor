<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$secret_key = '12345678'; 
$iv = '1234567812345678'; 
$encrypted_uid = $_GET['uid'];
$uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);


$sql = "DROP TABLE cart$uid";

if ($conn->query($sql) === TRUE) {
    echo "<script> window.location.href='http://localhost/project/Medicine/index.php?uid=$encrypted_uid';</script>";
} else {
  echo "Error dropping table: " . $conn->error;
}

$conn->close();

?>