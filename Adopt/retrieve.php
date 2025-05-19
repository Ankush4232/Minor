<!DOCTYPE html>
<html>
<head>
  <title>Display Animal Data</title>
</head>
<body>
  <h1>Display Animal Data</h1>
  <?php
  include 'dbconnect.php';

  $sql = "SELECT * FROM animals";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Image Name</th><th>Name</th><th>Age</th><th>Category</th><th>Breed</th><th>Gender</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["image_name"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td><td>" . $row["category"]. "</td><td>" . $row["breed"]. "</td><td>" . $row["gender"]. "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();
  ?>
</body>
</html>