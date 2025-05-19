<!DOCTYPE html>
<html>
<head>
    <title>Pet Adoption</title>
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
    </style>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');
    console.log(category); // Log the ID to the console
  
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

        
  <div class="container">
    <h1>Available Pets for Adoption</h1>
    <div class="pet-card-container">
      <?php
      include 'dbconnect.php';
            $category = $_GET['category'];
            $sql = "SELECT * FROM animals WHERE category = '$category'";

      //$sql = "SELECT * FROM animals ";                                                //   WHERE Category='Cat'
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?>
          <div class="pet-card">
            <img src="images/<?php echo $row["image_name"]; ?>" alt="<?php echo $row["name"]; ?>">
            <div>
              <h2><?php echo $row["name"]; ?></h2>
              <p>Age: <?php echo $row["age"]; ?> years</p>
              <p>Breed: <?php echo $row["breed"]; ?></p>
              <?php 
                    $encrypted_uid = $_GET['uid'];
                ?>
              <a href="http://localhost/project/Adopt/adopt.php?id=<?php echo $row["id"]; ?>&uid=<?php echo $encrypted_uid; ?>" >
                <button>Apply for Adoption</button>
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
