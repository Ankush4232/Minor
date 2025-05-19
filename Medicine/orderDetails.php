<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>    /* for navition bar */

.navbar {
display: flex;
justify-content: space-between;
align-items: center;
/* background-color: #9be6f9; */
background-image: linear-gradient(to top, #beebfc, #f3e3e3); 

width: 79%;
padding: 10px 140px;
top: 1px;
position: fixed;
}

.logo {
font-size: 24px;
font-weight: bold;
color: rgb(68, 3, 126);
}

.nav-links {
list-style: none;
display: flex;

gap: 20px;
}

.nav-links li {
display: inline;
}

.nav-links a {
text-decoration: none;
color: rgb(0, 0, 0);
font-size: 15px;
padding: 8px 12px;
transition: background 0.8s ease;
margin-right: 30px;
}

.nav-links a:hover {
background: #c2f9fd;
border-radius: 5px;
}

table{
    margin-top: 130px;
}
</style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
            <div class="logo">🐾 AnimalMediCare</div>
            <ul class="nav-links">
                <?php 
                    $encrypted_uid = $_GET['uid'];
                ?>
                <li><a href="#">Home</a></li>
                <li><a href="#">Buy Medicine</a></li>
                

                <li><a href="http://localhost/project/Medicine/cart.php?uid=<?php echo $encrypted_uid; ?>">🛒 Cart</a></li>
            </ul>
        </nav>



    
</body>
</html>
        
        
        



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

$secret_key = '12345678'; 
$iv = '1234567812345678'; 
$encrypted_uid = $_GET['uid'];
$uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);

$sql = "SELECT id,address, city, pincode, state, landmark, mobile, alternate_phone, payment_mode, order_summary, total_amount FROM delivery_address$uid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
  <table border="1" >
    <tr>
      <th>S.No.</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Phone numbers</th>
      <th>Payment Mode</th>
      <th>Order Summary</th>
      <th>Total Amount</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
      ?>
      <tr><td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["address"]; ?>, <?php echo $row["landmark"]; ?></td>
        <td><?php echo $row["city"]; ?>, <?php echo $row["pincode"]; ?></td>
        <td><?php echo $row["state"]; ?></td>
        
        <td>+91<?php echo $row["mobile"]; ?> 
            +91<?php echo $row["alternate_phone"]; ?></td>
        <td><?php echo $row["payment_mode"]; ?></td>
        <td><?php echo $row["order_summary"]; ?></td>
        <td><?php echo $row["total_amount"]; ?></td>
      </tr>
      <?php
    }
    ?>
  </table>
  <?php
} else {
  echo "No data found.";
}

$conn->close();
?>


