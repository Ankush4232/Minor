
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr><th>Product Name</th><th>Product Detail</th><th>Actual Price</th><th>Sell Price</th><th>Discount</th><th>Highlight 1</th><th>Highlight 2</th><th>Highlight 3</th><th>Highlight 4</th> <th>image_name</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["product_name"]. "</td><td>" . $row["product_detail"]. "</td><td>" . $row["actual_price"]. "</td><td>" . $row["sell_price"]. "</td><td>" . $row["discount"]. "</td><td>" . $row["highlight1"]. "</td><td>" . $row["highlight2"]. "</td><td>" . $row["highlight3"]. "</td><td>" . $row["highlight4"]. "</td><td>" . $row["image_name"]. "</td> </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>