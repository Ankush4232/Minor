<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Table name
    $secret_key = '12345678'; 
    $iv = '1234567812345678'; 
    $encrypted_uid = $_GET['uid'];
    $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);

$table_name = "delivery_address$uid";

// Check if table exists
$query = "SHOW TABLES LIKE '$table_name'";
$result = $conn->query($query);

if ($result->num_rows == 0) {
  // Table does not exist, create it
  $create_table_query = "CREATE TABLE $table_name (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  mobile VARCHAR(20) NOT NULL,
  pincode VARCHAR(10) NOT NULL,
  locality VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  state VARCHAR(255) NOT NULL,
  landmark VARCHAR(255),
  alternate_phone VARCHAR(20),
  payment_mode VARCHAR(255) NOT NULL,
  order_summary TEXT NOT NULL,
  total_amount VARCHAR(20) NOT NULL
  )";

  

  if ($conn->query($create_table_query) === TRUE) {
    echo "";
  } else {
    echo "Error creating table: " . $conn->error;
  }
} else {
  echo "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $mobile = $_POST["mobile"];
  $pincode = $_POST["pincode"];
  $locality = $_POST["locality"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $landmark = $_POST["landmark"];
  $alternate_phone = $_POST["alternate_phone"];
  $payment_mode = $_POST["payment_mode"];
  $order_summary = $_POST["order_summary"];
  $total_amount = $_POST["total_amount"];

  $sql = "INSERT INTO delivery_address$uid (name, mobile, pincode, locality, address, city, state, landmark, alternate_phone, payment_mode, order_summary, total_amount)
  VALUES ('$name', '$mobile', '$pincode', '$locality', '$address', '$city', '$state', '$landmark', '$alternate_phone', '$payment_mode', '$order_summary', '$total_amount')";

  if ($conn->query($sql) === TRUE) {
    // echo "Order placed successfully!";
    
    // $encrypted_uid = $_GET['uid'];
    echo "<script>alert('Order placed successfully!'); window.location.href='http://localhost/project/Medicine/cartDrop.php?uid=$encrypted_uid';</script>";
    // You can redirect to a success page or display a message
    // header("Location: http://localhost/project/index.html");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

