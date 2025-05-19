<script>
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    console.log(id); // Log the ID to the console
  
    // Use the ID to fetch the animal data from the database
    // or display the data accordingly
  </script>

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

// Table name
    $secret_key = '12345678'; 
    $iv = '1234567812345678'; 
    $encrypted_uid = $_GET['uid'];
    $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);

$table_name = "cart$uid";

// Check if table exists
$query = "SHOW TABLES LIKE '$table_name'";
$result = $conn->query($query);

if ($result->num_rows == 0) {
  // Table does not exist, create it
  $create_table_query = "CREATE TABLE $table_name (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) ,
    product_detail VARCHAR(255),
    actual_price INT(11) ,
    sell_price INT(11) ,
    discount INT(11) ,
    image_name VARCHAR(255) 
  )";

  if ($conn->query($create_table_query) === TRUE) {
    echo "";
  } else {
    echo "Error creating table: " . $conn->error;
  }
} else {
  echo "";
}

// ?>





// <?php
// include 'dbconnect.php';


  $id = $_GET['id'];

  // Retrieve product details from database
  $sql = "SELECT * FROM products WHERE id = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  // Insert product details into cart table
  $sql = "INSERT INTO cart$uid (product_name, product_detail, actual_price, sell_price, discount, image_name)
          VALUES ('".$row["product_name"]."', '".$row["product_detail"]."', '".$row["actual_price"]."', '".$row["sell_price"]."', '".$row["discount"]."', '".$row["image_name"]."')";
  if ($conn->query($sql) === TRUE) {
    // echo "Product added to cart successfully!";
    echo "<script>alert('Product added to cart successfully!'); window.location.href='http://localhost/project/Medicine/cart.php?uid=$encrypted_uid';</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


$conn->close();
?>
