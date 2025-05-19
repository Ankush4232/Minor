<!DOCTYPE html>
<html>
<head>
    <title>🐾 AnimalMediCare</title>
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


        .container {
            max-width: 1200px;
            
            margin: 0 auto;
            margin-top: 60px;
            padding: 20px;
            border-color: lightgray;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: white; 
        }
        h1 {
            text-align: center;
            font-size: 40px;
        }
        .pet-card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 100px;
        }
        .pet-card {
            
            background-color: whitesmoke;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .pet-card img {
            max-width: 150px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .pet-card button {
            background-color: teal;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .pet-card button:hover {
            background-color: lightblue;
            color: black;
            transform: scale(1.05);
        }

        .discount, .highlight{
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
            <li><a href="http://localhost/project/index2.php?uid=<?php echo $encrypted_uid; ?>">Home</a></li>
                <li><a href="http://localhost/project/Medicine/index.php?uid=<?php echo $encrypted_uid; ?>">Buy Medicine</a></li>
                <li><a href="http://localhost/project/Medicine/orderDetails.php?uid=<?php echo $encrypted_uid; ?>">Orders</a></li>

                <li><a href="http://localhost/project/Medicine/cart.php?uid=<?php echo $encrypted_uid; ?>">🛒 Cart</a></li>
            </ul>
        </nav>

        
  <div class="container">
    <h1>Medicine for Animals</h1>
    <div class="pet-card-container">
      <?php
      include 'dbconnect.php';

      $sql = "SELECT * FROM products ";                                                //   WHERE Category='Cat'
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?>
          <div class="pet-card">
            <img src="images/<?php echo $row["image_name"]; ?>" alt="<?php echo $row["product_name"]; ?>">
            <div>
              <h2><?php echo $row["product_name"]; ?></h2>
              <p class="product_detail"> <?php echo $row["product_detail"]; ?> </p>
              <p>Price: <?php echo $row["sell_price"]; ?> <span class="discount"><s><?php echo $row["actual_price"]; ?></s></span> <span class="discountpercent">(<?php echo $row["discount"]; ?>% off)</span></p>
              <p class="highlight"><?php echo $row["highlight1"]; ?> | <?php echo $row["highlight2"]; ?></p>

              <a href="http://localhost/project/Medicine/medi.php?id=<?php echo $row["id"]; ?>&uid=<?php echo $encrypted_uid; ?>" >
                <button>Click to Buy</button>
              </a>
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
  </div>
</body>
</html>
