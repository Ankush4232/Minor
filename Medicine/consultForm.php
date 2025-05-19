<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Docter Appointment Form</title>
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
      margin-top: 10px;
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
      margin-left: 30%;
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

    #problemSummary{
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
      <li><a href="">Contact-Us</a></li>
    </ul>
  </nav>
  <div class="main-container">
    <div class="form-container">
      <h2>Docter Appointment Form </h2>
      <form id="ConsultForm" method="post" action="FormSubmit.php?uid=<?php echo $encrypted_uid; ?>">

        <label for="personal_details">Personal Details</label>
        <div class="form-row">
          <input type="text" name="name" placeholder="Enter Your Name" required>
          <input type="text" name="mobile" placeholder="10-digit mobile number" required>
        </div>
        <label for="Address">Your Current Address</label>
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
          <input type="text" name="pincode" placeholder="Pincode" required>
        </div>
        <label for="Pet_Detail">Pet Details</label><br>
        <div class="form-row">
          <input type="text" name="Pet_Name" placeholder="Your Pet Name" required>
          <input type="text" name="Pet_Type" placeholder="Type: Cat/Dog/Cow" required>
          <input type="number" name="Pet_Age" placeholder="Age of pet" required>
        </div>
        <label for="Pet_Detail">Preferred Appointment Date</label><br>
        <div class="form-row">
          <input type="Date" name="Appointment_Date" placeholder="Appointment Date" required>
          
          <select name="Appointment_time" >
            <option>--Select Time--</option>
            <option>Morning (9 to 12)</option>
            <option>AfterNoon (12 to 4)</option>
            <option>Evening (4 to 7)</option>
            <option>Night (7 to 9)</option>
           
          </select>
        </div>

        
        <div>
          <label for="">Treatement Type</label>
          <br>
          <select name="checkUP_mode">
            <option>--Select One --</option>
            <option>Proper Check-Up</option>
            <option>Pet Animal Vaccination </option>
            <option>Animal Hospitalization</option>
          </select>

          <!-- Hidden field to store total amount -->
          <input type="hidden" name="UserUID" value="<?php echo $uid ?>"> 
          <label for="">Problem Detail Description</label>
          <br>
          <textarea name="problem_summary" id="problemSummary" rows="">

</textarea>

        </div>
        <button type="submit" class="btn">Submit</button>
        <button type="button" class="btn cancel-btn">CANCEL</button>
      </form>
    </div>
    
   
  </div>
</body>

</html>
