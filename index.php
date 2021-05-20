<?php
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
        <div><?php echo $_SESSION['Username'] ?></div>
        <button><a href="design.php">Start</a></button>

    <?php
    }
    ?>


    <script src="js/index.js">

    </script>
</body>

</html>