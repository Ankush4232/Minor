<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Page</title>
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

.adopt-section {
    display: flex;
    gap: 20px;
}

.dog-image img {
    width: 430px;
    height: 390px;
    border-radius: 10px;
}

.dog-details {
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
            <div class="logo">🐾 AdoptMe</div>
            <ul class="nav-links">
            <?php 
                    $encrypted_uid = $_GET['uid'];
                ?> 
                <li><a href="http://localhost/project/index2.php?uid=<?php echo $encrypted_uid; ?>">Home</a></li>
                <li><a href="http://localhost/project/Adopt/index.php?uid=<?php echo $encrypted_uid; ?>">Adopt a animals</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        
        <?php
            include 'dbconnect.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM animals WHERE id = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              // Display the animal data
              ?>


    <div class="container">
        <div class="adopt-section">
            <div class="dog-image">
                <img src="images/<?php echo $row["image_name"]; ?>" alt="Adoptable Dog">
                <div class="buttons">
                    <?php 
                        $encrypted_uid = $_GET['uid'];
                    ?> 
                    <a href="http://localhost/project/Adopt/details.php?id=<?php echo $row["id"]; ?>&uid=<?php echo $encrypted_uid; ?>" target="_blank">
                        <button class="apply-btn">APPLY FOR ADOPTION</button></a>
                        
                    <a href="#">
                        <button class="contact-btn">CONTACT US</button></a>
                </div>
            </div>
            

              <div class="dog-details">
                <h2>Meet <?php echo $row["name"]; ?>  🐾   </h2>
                <p class="subheading"><?php echo $row["breed"]; ?> | <?php echo $row["age"]; ?> Years Old | <?php echo $row["gender"]; ?></p>
              <!-- </div> -->
              <?php
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
          
                <h3 class="adoption-fee">Adoption Fee: ₹2,500 <span class="discount">Includes Vaccination & Training</span></h3>

                <h4>Why Adopt Bruno?</h4>
                <ul class="offers">
                    <li>✔️ Fully Vaccinated & Healthy</li>
                    <li>✔️ Trained in Basic Commands</li>
                    <li>✔️ Friendly & Loves Kids</li>
                    <li>✔️ Neutered & Microchipped</li>
                </ul>

                <h4>Adoption Process</h4>
                <p>1️⃣ Fill out an adoption form <br> 2️⃣ Meet & Greet Session <br> 3️⃣ Home Visit & Approval</p>

                <h4>Contact & Location</h4>
                <p>📍 Available in All India | Call us: 98XXX XXX10</p>

                <!-- <h4>Delivery</h4> -->
                <p>Delivery by <strong>29 Mar, Saturday</strong> | Free</p>
                <input type="text" placeholder="Enter Pincode">
                <button class="check-btn">Check</button>

                
            </div>
        </div>
    </div>

</body>
</html>
