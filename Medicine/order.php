<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delivery Address Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f3f6;
      margin: 0;
     
    }


    /* for navition bar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* background-color: #9be6f9; */
    background-image: linear-gradient(to top, #beebfc, #f3e3e3); 

    padding: 10px 140px;
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



    .main-container {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 20px;
      align-items: flex-start;
    }

    .form-container {
      
      width: 60%;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      margin-bottom: 20px;
      color: #172337;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    .form-row {
      display: flex;
      gap: 20px;
    }

    .form-row > div,
    .form-row > input,
    .form-row > select {
      flex: 1;
    }

    .btn {
      background: #fb641b;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn:hover {
      background: #d85d1c;
    }

    .cancel-btn {
      margin-left: 10px;
      background: #f0f0f0;
      color: #333;
    }

 


    .location-btn {
      background-color: #2874f0;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .price-box {
      width: 300px;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .price-box h4 {
      margin: 0 0 15px;
    }

    .price-line {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .total {
      font-weight: bold;
      font-size: 16px;
    }



    hr {
      margin: 10px 0;
    }

    #OrderSummary{
      width: 100%;
      margin-top: 10px;
    }

    label{
      font-weight: bold;
      font-size: larger;
    }
  </style>



</head>
<body>


<?php
            include 'dbconnect.php';

            $secret_key = '12345678'; 
            $iv = '1234567812345678'; 
            $encrypted_uid = $_GET['uid'];
            $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);
    
            
            $sql = "SELECT * FROM cart$uid ";
            $result = $conn->query($sql);

            $sql1 = "SELECT SUM(sell_price) AS total_sell_price FROM cart$uid";
            $result1 = $conn->query($sql1);
            $row = $result1->fetch_assoc();               // total rows in table
            $total_price = $row['total_sell_price'];      // total aomunt of product
            // if ($result->num_rows > 0) {
            //   $row = $result->fetch_assoc();
            //   // Display the animal data
        ?>
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
      <li><a href="">Contact-Us</a></li>
    </ul>
  </nav>
  <div class="main-container">
    <div class="form-container">
      <h2>Final Submission Page</h2>
      <form id="deliveryForm" method="post" action="submitOrder.php?uid=<?php echo $encrypted_uid; ?>">
        <button class="location-btn">Add your current Address</button>
        <div class="form-row">
          <input type="text" name="name" placeholder="Name" required>
          <input type="text" name="mobile" placeholder="10-digit mobile number" required>
        </div>
        <div class="form-row">
          <input type="text" name="pincode" placeholder="Pincode" required>
          <input type="text" name="locality" placeholder="Locality" required>
        </div>
        <input type="text" name="address" placeholder="Address (Area and Street)" required>
        <div class="form-row">
          <input type="text" name="city" placeholder="City/District/Town" required>
          <select name="state" >
            <option>--Select State--</option>
            <option>Delhi</option>
            <option>Madhya Pradesh</option>
            <option>Maharashtra</option>
            <option>Karnataka</option>
            <option>Tamil Nadu</option>
          </select>
        </div>
        <div class="form-row">
          <input type="text" name="landmark" placeholder="Landmark (Optional)">
          <input type="text" name="alternate_phone" placeholder="Alternate Phone (Optional)" required>
        </div>
        <div>
          <label for="">Mode of Payment</label>
          <br>
          <select name="payment_mode">
            <option>--Select Payment Mode--</option>
            <option>Cash on Delivery</option>
          </select>

          <!-- Hidden field to store total amount -->
          <input type="hidden" name="total_amount" value="<?php echo $total_price+10 ?>"> 
          <label for="">Order Summary</label>
          <br>
          <textarea name="order_summary" id="OrderSummary" rows="4">
            <?php
          if ($result->num_rows > 0) {
            $count =1;
  while ($row = $result->fetch_assoc()) {
    ?>Product : <?php echo $count ?>

    Product Name: <?php echo $row["product_name"]; ?>,
    Product Quantity: 1 ,
    Actual Price: <?php echo $row["sell_price"]; ?>,
    <?php $count = $count+1  ?>
    
    <?php } ?>
    User ID: <?php echo $uid ?>,     Total Product : <?php echo $result->num_rows ?>,     
        Total price of Product : <?php echo $total_price ?>
</textarea>

        </div>
        <button type="submit" class="btn">SAVE AND DELIVER HERE</button>
        <button type="button" class="btn cancel-btn">CANCEL</button>
      </form>
    </div>
    <div class="price-box">
      <h4>PRICE DETAILS</h4>
      <div class="price-line"><span>Price (<?php echo $count-1 ?> item)</span><span>₹<?php echo $total_price ?></span></div>
      <div class="price-line"><span>Delivery Charges</span><span>₹0</span></div>
      <div class="price-line"><span>Platform Fee</span><span>₹10</span></div>
      <hr>
      <div class="price-line total"><span>Total Payable</span><span>₹<?php echo $total_price+10 ?></span></div>
    </div>
    <?php
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
  </div>
</body>

</html>
