<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #0077b6, #90e0ef);
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            color: #0077b6;
        }

        .profile-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .profile-info,
        .activities {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 30px;
            background: #f9f9f9;
        }

        .profile-info .info-item {
            margin-bottom: 15px;
        }

        .profile-info .info-item label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .profile-info .info-item span {
            font-size: 1rem;
            color: #555;
        }

        .info-item .actions {
            margin-top: 10px;
        }

        .info-item .actions button {
            padding: 8px 12px;
            margin-right: 5px;
            font-size: 0.9rem;
            border: none;
            border-radius: 4px;
            background: #0077b6;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        .info-item .actions button:hover {
            background: #005f8b;
        }

        .activities h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #0077b6;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            .profile-header h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>

        <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "signup_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            $secret_key = '12345678'; 
            $iv = '1234567812345678'; 
            $encrypted_uid = $_GET['uid'];
            $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);

            if (!empty($uid)) {
              $query = "SELECT * FROM users WHERE uid='$uid'";
              $result = mysqli_query($conn, $query);
            
              if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                // Fetch other columns as needed
              } else {
                echo "No user found with the given UID.";
              }
          
        ?>
    <div class="container">
        <header class="profile-header">
            <h1>Profile Details</h1>
        </header>

        <section class="profile-info">
            <div class="info-item">
                <label>Name</label>
                <span><?php echo $username; ?></span>
            </div>
            <div class="info-item">
                <label>User ID</label>
                <span><?php echo $uid; ?></span>
            </div>
            <div class="info-item">
                <label>Email</label>
                <span><?php echo $email; ?></span>
            </div>
            <div class="info-item">
                <label>Password</label>
                <span id="password">******</span>
                <div class="actions">
                    <button id="revealBtn" onclick="showPassword()">Reveal</button>
                    <script>
                        function showPassword() {
                        document.getElementById("password").textContent = "<?php echo $password; ?>";
                    }
                    </script>

                    <button>Edit</button>
                </div>
            </div>
        </section>
        <?php 
            } else {
                echo "Invalid UID.";
                }

            $conn->close();
        ?>
        <section class="activities">
            <h2>Activities</h2>
            <div class="activities-content">
            </div>
        </section>
    </div>
</body>

</html>