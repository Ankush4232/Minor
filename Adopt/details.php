<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adoption Appointment Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #AEC6CF;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 94vh;
            margin: 0;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            text-align: center;
        }
        .appointment-form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .appointment-form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        .appointment-form input,
        .appointment-form textarea,
        .appointment-form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .appointment-form button {
            align-self: center;
            background-color: teal;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .appointment-form button:hover {
            background-color: lightblue;
            color: black;
            transform: scale(1.05);
        }

        .non-editable {
          pointer-events: none;
          user-select: none;
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
        <?php
            include 'dbconnect.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM animals WHERE id = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              // Display the animal data
        ?>

    <div class="appointment-form">
        <h1>Schedule Your Adoption Appointment</h1>
        <p>We're excited to help you find your new friend!</p>
        <p>Please fill out the form below, and we'll get in touch to confirm your appointment.</p>
        <?php 
            $encrypted_uid = $_GET['uid'];
        ?> 
        <form action="submit_request.php?uid=<?php echo $encrypted_uid; ?>" method="post">
            <label for="name">Full Name </label>
            <input type="text" id="name" name="name" placeholder="Your full name" required>

            <label for="email">Email Address </label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>

            <label for="phone">Phone Number </label>
            <input type="tel" id="phone" name="phone" placeholder="123-456-7890" required>

            <label for="appointment-date">Preferred Appointment Date </label>
            <input type="date" id="appointment-date" name="appointment_date" required>

            <label for="address">Your Address</label>
            <textarea id="address" name="address" rows="2" placeholder="Enter Your Full Address"></textarea>

            <label for="message">Additional Message</label>
            <textarea id="message" name="message" rows="2" placeholder="Any specific questions or requests?"></textarea>
            
            <?php 
                $secret_key = '12345678'; 
                $iv = '1234567812345678'; 
                $encrypted_uid = $_GET['uid'];
                $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);
            ?>

            <label for="Animal_details">Adopted Animal Details</label>
            <textarea class="non-editable" id="Animal_details" name="Animal_details" rows="4" readonly>
Name: <?php echo $row["name"]; ?>,              Age: <?php echo $row["age"]; ?>,	
Category: <?php echo $row["category"]; ?>,	          Breed: <?php echo $row["breed"]; ?>,	
Gender: <?php echo $row["gender"]; ?>,             Animal Id: ANIMALS00<?php echo $row["id"]; ?> ,   
USER-UID: <?php echo $uid ?> 
</textarea>


            <button type="submit">Submit Request</button>
        </form>

        <?php
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
    </div>
</body>
</html>
