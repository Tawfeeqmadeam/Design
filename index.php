<?php
include "connected.php";
session_start();
if (isset($_SESSION['ID'])) {
    //echo $_SESSION['Username']; // Register Session Name
    //echo $_SESSION['ID'];
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
    <link rel="stylesheet" href="css/desgin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-ui.min.js"></script>
</head>

<body style="width:99%;height: 706px;">
    <?php
    if (!isset($_SESSION['ID'])) {
    ?>
        <div>
            <button><a href="login.php">login</a></button>
            <button><a href="sign.php">sign</a></button>
        </div>
    <?php
    } else { ?>
        <?php
        $sql = "SELECT roomID FROM room WHERE userID='0'";
        $result = $db->query($sql);
        if ($result !== false && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $count = $row['roomID'];
        } else {
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

        <h1 style="color: blue;  text-align: center; "> Welcome <?php echo $_SESSION['Username'] ?> to your home </h1>

        <?php echo "<button id='newRoom'><a href='createRoom.php?roomID=" . $count . "' >New Room</a></button>" ?>

        <?php
        $sql = "SELECT roomID FROM room WHERE userID" . "='" . $_SESSION['ID'] . "'";
        $result = $db->query($sql);
        $t=0;
        if ($result->num_rows > 0) {
            echo "<div class='container'>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if($t==0||($t)%4==0)
                    echo "<div class='row'>";
                echo "<div class='col-3' ><a href='design.php?roomID=" . $row['roomID'] . "'><div class='publicRoom' ><span class='align-middle'>Room" . $row['roomID'] . "</span></div></a></div>";
                if($t%4==3)
                    echo "</div>";
                $t++;
            }
            echo "</div>";

        }


        ?>
        

    <?php
    }
    ?>


    <script src="js/index.js">

    </script>
</body>

</html>