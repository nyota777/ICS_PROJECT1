<?php
require_once 'database.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    // Input Sanitization
    $username=filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
    $email=filter_input(INPUT_POST,'email,'FILTER_VALIDATE_EMAIL);
    $password=$_POST['password'];
    
    //Password Hashing
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    // Prepared statement(SQL INJCETION PREVENTION)

$sql="INSERT INTO users(username,email,password) VALUES(?,?,?)";
$stmt=$con->prepare(sql);
$stmt->bind_param("sss",$username,$email,$password_hash);

if ($stmt->execute()){
    header("Location:login.html?successful=1"); //Redirecting to Login Page
} else{
    echo "Error during registration";

}
$stmt->close();
$conn->close();

}
?>
<!DOCTYPE hmml>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="widht=device-width,initial-scale=1.0">
    <title>AUTHENTICATION</title>

    <link rel="stylesheet" href="style.css">
</head>
<!--wrapper-->
<div class="wrapper">
    <section>
        <center>
            <header>
                Registration form
            </header>
        </center>
        <!-- registration form starts here-->
        <form action="add_user.php" class="header" method="post">
            <div class="field input">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Enter your name">
            </div>
            <div class="field input">
                <label for="">Role</label>
                <input type="text" name="role" placeholder="Enter your role">
            </div>
            <div class="field input">
                <label for="">Email Address</label>
                <input type="email" name="email" placeholder="Enter your email">
            </div>
            <div class="field input">
                <label for="">Username</label>
                <input type="text" name="user" placeholder="Enter your username">
            </div>
            <div class="field input">
                <label for="">Password</label>
                <input type="password" name="pass" placeholder="Enter your password">
            </div>
            <div class="field input">
                <label for="">Confirm password</label>
                <input type="password" name="confirm_password" placeholder="Confirm your password">
            </div>
            <div class="field button">
                <button onclick="successful_registration()">REGISTER</button>
            </div>

            <a href="login.php" class="link">Login here...</a>
        </form>
        <!--registration form ends here-->
    </section>
</div>
<script>
function successful_registration() {
    setTimeout(function() {}, 1000);
    alert("User successfully registered.");
}
</script>
<!--wrapper-->

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: login.php");
  }
  ?>