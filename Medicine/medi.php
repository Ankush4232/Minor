<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐾 AnimalMediCare</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
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



/* for adopt container  */
.container {
    width: 80%;
    margin: 20px auto;
    display: flex;
    margin-top: 70px;
    background: white;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.product-section {
    display: flex;
    gap: 20px;
}

.medi-image img {
    width: 430px;
    height: 390px;
    border-radius: 10px;
}

.product-details {
    max-width: 600px;
    margin-left: 100px;
}

h2 {
    font-size: 24px;
    margin-bottom: 5px;
}

.subheading {
    color: gray;
    font-size: 16px;
}

.adoption-fee {
    font-size: 22px;
    color: #e63946;
    font-weight: bold;
}

.discount {
    color: green;
    font-size: 14px;
}

h4 {
    margin-top: 15px;
    font-size: 18px;
}

.offers {
    list-style: none;
    padding: 0;
}

.offers li {
    font-size: 16px;
    margin-bottom: 5px;
    list-style: none;
}

.buttons {
    margin-top: 50px;
   
    
}

.apply-btn, .contact-btn {
    padding: 12px 18px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    margin-right: 10px;
}

.apply-btn {
    background: #ff6600;
    color: white;
}

.contact-btn {
    background: #008CBA;
    color: white;
}


.offer{
width: 20px;
height: auto; margin-left: -20px;

}
li{
    line-height: 25px;
}

    </style>

<script>
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
                <li><a href="http://localhost/project/Medicine/cart.php?uid=<?php echo $encrypted_uid; ?>">🛒 Cart</a></li>
            </ul>
        </nav>
        

        <?php
            include 'dbconnect.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              // Display the animal data
              ?>

    <div class="container">
        <div class="product-section">
            <div class="medi-image">
                <img src="images/<?php echo $row["image_name"]; ?>" alt="Medicine Product">
                <div class="buttons">

                    <a href="http://localhost/project/Medicine/order1.php?id=<?php echo $row["id"]; ?>&uid=<?php echo $encrypted_uid; ?>" target="_blank">
                        <button class="apply-btn">Buy Medicine Now</button></a>
                        
                    <a href="http://localhost/project/Medicine/cart3.php?id=<?php echo $row["id"]; ?>&uid=<?php echo $encrypted_uid; ?>">
                        <button class="contact-btn">🛒Add to Cart</button></a>
                </div>
            </div>
            
            <div class="product-details">
                <h2><?php echo $row["product_name"]; ?></h2>
        <p><?php echo $row["product_detail"]; ?></p>
        <p class="price">₹<?php echo $row["sell_price"]; ?> <span class="discount"><s>₹<?php echo $row["actual_price"]; ?></s></span> (<?php echo $row["discount"]; ?>% off)</p>
        <p style="color: red;">Hurry, Only a few left!</p>

        <div class="offers">
            <p><strong>Available Offers:</strong></p>
            <ul>
                <li><img src="images/offer.png" class="offer" alt="">&nbsp;&nbsp; Combo Offer: Buy 2 items save ₹20; Buy 3 or more save ₹40</li>
                <li><img src="images/offer.png" class="offer" alt="">&nbsp;&nbsp; Combo Offer: Buy 2 items save ₹30; Buy 3 or more save ₹75</li>
                <li><img src="images/offer.png" class="offer" alt="">&nbsp;&nbsp; Bank Offer: ₹15 Instant Discount on Prepaid Transaction</li>
                <li><img src="images/offer.png" class="offer" alt="">&nbsp;&nbsp; Bank Offer: 5% Unlimited Cashback on Flipkart Axis Bank Credit Card</li>
            </ul>
        </div>

                <h3>Highlights:</h3>
                <ul>
                    <li><?php echo $row["highlight1"]; ?></li>
                    <li><?php echo $row["highlight2"]; ?></li>
                    <li><?php echo $row["highlight3"]; ?></li>
                    <li><?php echo $row["highlight4"]; ?></li>
                </ul>
                
                <!-- <h4>Delivery</h4> -->
                <p>Delivery by <strong>29 Mar, Saturday</strong> | Free</p>
                <input type="text" placeholder="Enter Pincode">
                <button class="check-btn">Check</button>

                <?php
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
                
            </div>
        </div>
    </div>

</body>
</html>
