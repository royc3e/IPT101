<?php
session_start();
include 'db_conn.php';
   
    if (isset($_SESSION['temp_user'])) {
    header("Location: signup.php");
    exit();
}


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_otp = $_POST['otp'];
        $stored_otp = $_SESSION['temp_user']['otp'];
        $user_id = $_SESSION['temp_user']['id'];
        $sql = "SELECT * FROM user WHERE user_id='$user_id' AND otp='$user_otp'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
        if ($data) {
            $otp_expiry = strtotime($data['otp_expiry']);
            if ($otp_expiry >= time()) {
            $_SESSION['user_id'] = $data['id'];
            unset($_SESSION['temp_user']);
            header("Location: signup.php");
        exit();
    } else {
    ?>

        
            <script>
        alert("OTP has expired. Please try again.");
        function navigateToPage() {
        window.location.href = 'signup.php';
        }
        window.onload = function() {
        navigateToPage();
        }
        </script>
        <?php
        }
        } else {
        echo "<script> alert('Invalid OTP. Please try again.'); </script>";
        }
        }
        ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style type="text/css">
            body {
            background-color: lightgreen;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            }
            #container{
            width: 600px;
            border: 3px solid rgb(177, 142, 142);
            padding: 20px;
            background-color: #05386b;
            border-radius: 20px;
            }
            
            form{
            margin-left: 50px;
            color: white;
            }
            p{
            margin-left: 50px;
            color: white;
            }

            h1{
            margin-left: 50px;
            color: white;
            }

            input[type=number]{
            width: 290px;
            padding: 10px;
            margin-top: 10px;
            }

            button{
            background-color: orange;
            border: 1px solid orange;
            width: 100px;
            padding: 9px;
            margin-left: 100px;
            }

            button:hover{
            cursor: pointer;
            opacity:.9;
            }

        </style>
    </head>
        <body>
            <div id="container">
                <h1>New record created successfully</h1>
                <h1>Two-Step Verification</h1>
                <p>Enter the 6 Digit OTP Code that has been sent <br> to your email address: <?php echo $_SESSION['email']; ?></p>
            <form method="post" action="otp_verification.php">
                <label style="font-weight: bold; font-size: 18px;" for="otp">Enter OTP Code:</label><br>
                <input type="number" name="otp" pattern="\d{6}" placeholder="Six-Digit OTP" required><br><br>
                    <button type="submit">Verify OTP</button>
        </form>
    </div>
</body>
</html>