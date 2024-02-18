<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            
              include("connect.php");
              if(isset($_POST['submit'])){
                 $email = mysqli_real_escape_string($conn,$_POST['email']);
                 $password = password_hash(mysqli_real_escape_string($conn,$_POST['password']), PASSWORD_DEFAULT);

                 $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND pwd='$password' ") or die("Select Error");
                 $row = mysqli_fetch_assoc($result);

                 if ($row && password_verify($_POST['password'], $row['pwd'])) {
                    // Successful login
                    $_SESSION['valid'] =$row['email'];
                    $_SESSION['username'] =$row['username'];
                    $_SESSION['id'] =$row['user_id'];
                    
                    session_regenerate_id();
                   } else {
                     // Check if the user exists with the provided email
                     $userCheck = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
                     $existingUser = mysqli_fetch_assoc($userCheck);
                
                     if (is_array($existingUser) && !empty($existingUser)) {
                        // Incorrect password
                        echo "<div class='message'><p>Incorrect Password</p></div> <br>";
                     } else {
                        // User does not exist
                        echo "<div class='message'><p>User does not exist</p></div> <br>";
                     }
                
                     echo "<a href='login.php'><button class='btn'>Go back</button></a>";
                     }
                }else{

            ?>
            <header>Login</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    <img src="eye-closed.png" alt="Show/Hide Password" id="showPassword">
                </div>

                <div class="option_field">
                    <a href="reset-password.php" class="forgot_pw">Forgot password?</a>

                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>





