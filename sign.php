<?php
require("connected.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $email = $_POST['email'];
     $proName = $_POST['name'];
     $pass = $_POST['psw'];

    if (isset($email) && isset($proName) && isset($pass)) {
        $sqlmails = "SELECT Email FROM users WHERE Email" . "='" . $_POST["email"] . "'";
        $resultmails = $db->query($sqlmails);
        $countmails = $resultmails->num_rows; // מחשב אם הייתה תוצאה 
        if($countmails == 0){
            $sql = "INSERT INTO `users` (`Username`, `Email`, `Password`)";
            $sql .= "VALUES('" . $proName . "','" . $email . "','" . $pass . "')";
            $result = $db->query($sql);
            header('Location: login.php'); // Redirect To Dashboard page
        }
        else{
            echo "the mail found in datat base , please sign in other mail !!! thanks";
        }
    } else {
        echo 'error';
        exit;
    }
}

?>
<!DOCTYPE html>
<html>

<head>


</head>

<body>
    <form action="sign.php" method="POST" style="border:1px solid #ccc">
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