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
	<meta charset="utf-8">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>

<body class="form-v9">
	<div class="page-content" style="background:linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);">
		<div class="form-v9-content" style="background-image: url('images/form-v9.jpg')">
			<form class="form-detail" action="sign.php" method="post">
				<h2>Sign up </h2>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="name" id="full-name" class="input-text" placeholder="Your Name" required>
                    </div>
                    <div class="form-row">
						<input type="text" name="email" id="your-email" class="input-text" placeholder="Your Email" required>
                    </div>
                </div>
            <div class="form-row-total">
			  <div class="form-row">
						<input type="password" name="psw" id="password" class="input-text" placeholder="Your Password" required>
                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
              </div>
             <div class="form-row">
						<input type="password" id="comfirm-password" class="input-text" placeholder="Comfirm Password" required>
			 </div>
            </div>
          
            <div class="form-row-last clearfix">
              <input type="submit" name="register" class="register signupbtn" value="Register">
              <input type="button" name="register" class="register cancelbtn" value="Cancel">
			</div>

            
             </form>
        </div>
    </div>

</body>

</html>