<?php
    include("db_conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="index.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username:</label>
        <input type="text" name="uname" placeholder="Enter your username"><br>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter your password"><br>
        <button type="submit">Login</button>  
        <p>Don't have an account?<a href="signup.php">Sign up here</a></p>     
    </form>
        
</body>
</html>