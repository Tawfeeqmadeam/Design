<?php
require("connected.php");
session_start();
 if(isset($_SESSION["name"])){
    header('Location: index.php');
 }
?>
<!DOCTYPE html>
<html>

<head>


</head>

<body>
    <form action="insert.php" method="get" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="email"><b>name</b></label>
            <input type="text" placeholder="Enter name" name="name" required>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>



</body>

</html>