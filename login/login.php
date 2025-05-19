<?php
// include 'dbconnect.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $uid = $row['uid'];
        $secret_key = '12345678';                              // Replace with your secret key
        $iv = '1234567812345678';                                        // Replace with your IV (must be 16 characters long)
        $encrypted_uid = openssl_encrypt($row['uid'], 'aes-256-cbc', $secret_key, 0, $iv);
    


        echo "<script>alert('Login successful!'); window.location.href='http://localhost/project/index2.php?uid=$encrypted_uid';</script>";
    } else {
        echo "<script>alert('Invalid email or password!'); window.location.href='http://localhost/project/login/index.html';</script>";
    }
}

$conn->close();
?>


