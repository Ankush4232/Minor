<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
     body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
         background-color: #f6fcfe;
        /* background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
    } 
    /* for navition bar */

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



        .cart-container {
            
            background-color: white;
            padding: 20px;
            max-width: 750px;
            margin: auto;
            margin-top: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cart_detail{
            
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
            margin-bottom: 50px;
            
        }
        /* .cart-item {
            display: flex; 
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        } */
        .cart-item img {
            width: 150px;
            height: 150px;
            margin-right: 15px;
        }
        .cart-details {
            flex-grow: 1;
            line-height: 1.2em;     
        }
        /* .cart-actions {
            display: flex;
            align-items: center;
        } */
        .quantity-selector {
            display: flex;
            align-items: center;
        }
        .quantity-selector button {
            background: #ddd;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .place-order {
            display: block;
            width: 35%;
            background: orange;
            color: white;
            text-align: center;
            padding: 10px;
            border: none;
            /* margin-top: 20px; */
            cursor: pointer;
            font-size: 16px;
        }
        .discount, .highlight , .delivery{
            color: gray;
            font-size: small;
        }
        .discountpercent{
            color: green;
        }
        .product_detail{
            margin-top: -5px;
            font-size: 13.5px;

        }
        .totalAmount{
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        a{
            text-decoration: none;
            color: white;
            font-size: medium;
        }
    </style>
    <script>



        function updateQuantity(button, delta) {
            let quantitySpan = button.parentNode.querySelector("span");
            let currentQuantity = parseInt(quantitySpan.textContent);
            let newQuantity = currentQuantity + delta;
            if (delta > 0 && currentQuantity >= 1) {
    alert("Only one product is allowed!");
    return;
  }

        }


       
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        console.log(id); // Log the ID to the console
        
        // Use the ID to fetch the animal data from the database
        // or display the data accordingly
  
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">🐾 AnimalMediCare</div>
        <ul class="nav-links">
        <?php 
                    $encrypted_uid = $_GET['uid'];
                ?>
            <li><a href="http://localhost/project/index2.php?uid=<?php echo $encrypted_uid; ?>">Home</a></li>
                <li><a href="http://localhost/project/Medicine/index.php?uid=<?php echo $encrypted_uid; ?>">Buy Medicine</a></li>
                <li><a href="http://localhost/project/Medicine/orderDetails.php?uid=<?php echo $encrypted_uid; ?>">Orders</a></li>
            <li><a href="#"></a></li>
        </ul>
    </nav>
    

    <div class="cart-container">
        <div class="cart-item">
           
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

        

        $sql = "SELECT * FROM cart$uid ";                                                //   WHERE Category='Cat'
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?>  
            <div class="cart_detail">
            <img src="images/<?php echo $row["image_name"]; ?>" alt="Bird Food">
            <div class="cart-details">
                <h2><?php echo $row["product_name"]; ?></h2>
                <p class="product_detail"> <?php echo $row["product_detail"]; ?>  </p>
                 <p>Price: <b>₹<?php echo $row["sell_price"]; ?></b>  <span class="discount"><s>₹<?php echo $row["actual_price"]; ?></s></span> <span class="discountpercent">(<?php echo $row["discount"]; ?>% off)</span></p>

                <p class="delivery">Delivery by Mon Apr 7 | Free</p>
            </div>
            <div class="cart-actions">
                <div class="quantity-selector">
                    <button onclick="updateQuantity(this, -1)">-</button>
                    <span >1</span>
                  
                    <button onclick="updateQuantity(this, 1)">+</button>
                    
                    
                </div>
                <br>
                <form action="remove_from_cart.php?uid=<?php echo $encrypted_uid; ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <input type="submit" value="Remove">
                </form>


            </div>
            </div>
            <?php
        }
      } else {
        echo "0 results";
      }

      $conn->close();
      ?>
         
         
        </div>
        <?php 
include 'dbconnect.php'; 
        $secret_key = '12345678'; 
        $iv = '1234567812345678'; 
        $encrypted_uid = $_GET['uid'];
        $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);

// Get the total price from the database
$sql = "SELECT SUM(sell_price) AS total_sell_price FROM cart$uid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_price = $row['total_sell_price'];

// Get the total number of items from the database
$sql = "SELECT * FROM cart$uid";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
?>

<div class="totalAmount">
  <P>TOTAL ITEMS : <?php echo $result->num_rows ?></P>
  <P>TOTAL PRICE : <?php echo $total_price ?></P>
  
  <?php 
        $encrypted_uid = $_GET['uid'];
    ?>
    <a href="http://localhost/project/Medicine/order.php?uid=<?php echo $encrypted_uid; ?>">
        <button class="place-order">PLACE ORDER
    </a>
  </button>
</div>

<?php 
} 
$conn->close();
?>

    
</body>
</html>
