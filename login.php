<?php
include "connected.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo $_POST["email"];
    echo $_POST["psw"];
    $sql = "SELECT ID,Username,Email FROM users WHERE Email"."='".$_POST["email"]."'"." AND "."Password='" . $_POST["psw"]."'";
    echo $sql;
    $result = $db->query($sql);
    echo"<br>";
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Username"] . " " . $row["Email"] . "</td></tr>";
        }
       
    } else {
        echo "0 results";
    }

}

?>
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