<?php
include "connected.php";
include "header.php";
ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo $_POST["email"];
    echo $_POST["psw"];
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
<body>
    <form action="login.php" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1>login </h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="email"><b>email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="loginbtn">login </button>
            </div>
        </div>
    </form>
    <?php
    if (isset($formErrors)) {
        echo "<div class='formErros'>" . $formErrors . "</div>";
    }


    ?>
    <script src="js/index.js">

    </script>
</body>
</html>