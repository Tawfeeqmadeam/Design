<?php
include "connected.php";
include "header.php";
ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //  echo $_POST["email"];
   // echo $_POST["psw"];
    $sql = "SELECT ID,Username,Email FROM users WHERE Email" . "='" . $_POST["email"] . "'" . " AND " . "Password='" . $_POST["psw"] . "'";
    $result = $db->query($sql);
    $data = $result->fetch_assoc(); // מפענח את הנתונים שמתקבלים 
    $count = $result->num_rows; // מחשב אם הייתה תוצאה 

    if ($count > 0) {
        $_SESSION['Username'] = $data['Username']; // Register Session Name
        $_SESSION['ID'] = $data['ID'];
        header('Location: index.php'); // Redirect To Dashboard page
        exit();
    } else {
        $formErrors = "The email or password not Invaild";
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

<body class="form-v9" ;>
<div class="page-content" style="background:linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);">
<div class="form-v9-content" style="background-image: url('images/form-v9.jpg')">
<form class="form-detail" action="login.php" method="post">
<h2>Login in</h2>        
            <div class="form-row-total">
					<div class="form-row">
						<input type="text" name="email" id="your-email" class="input-text" placeholder="Your Email" required>
                    </div>

			  <div class="form-row">
						<input type="password" name="psw" id="password" class="input-text" placeholder="Your Password" required>
              </div>
            </div>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="form-row-last">
            <input type="submit" name="register" class="register loginbtn" value="Login ">
            <input type="button" name="register" class="register cancelbtn" value="Cancel">
			</div>

           
</form>
</div>
</div>


    <?php
    if (isset($formErrors)) {
        echo "<div class='formErros'>" . $formErrors . "</div>";
    }
    ?>
    <script src="js/index.js"></script>
</body>
</html>