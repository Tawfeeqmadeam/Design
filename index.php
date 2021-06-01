<?php
include "connected.php";
 session_start();
if (isset($_SESSION['ID'])) {
 echo $_SESSION['Username']; // Register Session Name
 echo $_SESSION['ID'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery-ui.min.js"></script>
</head>

<body style="width:99%;height: 706px;">
    <?php
    if(!isset($_SESSION['ID'])){
    ?>
    <div>
        <button><a href="login.php">login</a></button>
        <button><a href="sign.php">sign</a></button>
    </div>
    <?php
    }else{?>
    <?php

        $sql = "SELECT roomID FROM room WHERE userID='0'";
        $result = $db->query($sql);
        if($result !== false && $result->num_rows > 0){
            $row = $result->fetch_assoc();
            $count = $row['roomID'];
        }else{
            $sql = "INSERT INTO `room` (`userID`)";
            $sql .= "VALUES('')";
            $result = $db->query($sql);
            if ($result !== false) {
                $_SESSION['room'] = "ok";
            }
            $sql = "SELECT roomID FROM room WHERE userID='0'";
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            $count = $row['roomID'];
        }
    ?>
      <div id="user"><?php echo $_SESSION['ID'] ?></div>
        <?php echo "<button id='newRoom'><a href='design.php?roomID=".$count."' >new room</a></button>"?>
        
        <?php
        $sql = "SELECT roomID FROM room WHERE userID" . "='" . $_SESSION['ID'] . "'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<button><a href='design.php?roomID=".$row['roomID']."'>room".$row['roomID']."</a></button>";
            }
        }
       

        ?>

    <?php
    }
    ?>


    <script src="js/index.js">

    </script>
</body>

</html>