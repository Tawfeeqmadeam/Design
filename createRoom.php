<?php
include "connected.php";

session_start();
if (isset($_SESSION['ID'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['roomID'])) {
            $sql = "UPDATE room SET `userID` = '" . $_SESSION['ID'] . "' WHERE `roomID` = '" . $_GET['roomID'] . "'";
            $result = $db->query($sql);
        }
    }
} else {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $_GET['roomID'] ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/desgin.css">
    <script src="js/jquery-ui.min.js"></script>
</head>

<body style="width:99%;height: 706px;">
    <svg id="roomArea" width="99%" height="700px">
        <polygon id="polygon" points="0,0 400,0 400,400 0,400" stroke="purple" stroke-width="0" class="eee" transform="translate(550,250)"></polygon>
        <rect class="rect" x="883" y="400" width="70" height="100" style="fill: rgb(139 69 19);stroke-width:3;stroke: rgb(255,0,0);">
        </rect>
        <rect class="rect" x="700" y="250" width="100" height="40" style="fill: rgb(139 69 19);stroke-width:3;stroke: rgb(232 101 8);">
        </rect>
        <rect class="rect" x="700" y="619" width="100" height="40" style="fill: rgb(139 69 19);stroke-width:3;stroke: rgb(232 101 8);">
        </rect>
        <rect class="bab" x="950" y="400" width="10" height="100" style="fill:rgb(0, 255, 42);stroke-width:3;stroke:rgb(0,0,0)">
        </rect>
        <rect class="window" x="700" y="240" width="100" height="10" style="fill:rgb(184, 233, 7);stroke-width:3;stroke:rgb(0,0,0)">
        </rect>
        <rect class="END2" id="window1" x="700" y="651" width="100" height="10" style="fill:rgb(184, 233, 7);stroke-width:3;stroke:rgb(0,0,0)">
        </rect>
    </svg>


    <div id="moveItem">
        <button id="left"><i class="bi bi-arrow-left">left</i></button>
        <button id="rigth"><i class="bi bi-arrow-left">rigth</i></button>
        <button id="up"><i class="bi bi-arrow-left"></i>up</button>
        <button id="down"><i class="bi bi-arrow-left">down</i></button>
        <button id="ok"><i class="bi bi-arrow-left">ok</i></button>

    </div>
    <?php
    include "tools.php";
    ?>
    <div id="custom">
        <div class="container">
            <button id="decHrect">-</button>
            <input id="inputHrect" type="text" value="1" />
            <button id="incHrect">+</button>
        </div>
        <div class="container">
            <button id="decWrect">-</button>
            <input id="inputWrect" type="text" value="1" />
            <button id="incWrect">+</button>
        </div>
    </div>


    <script src="js/desgin.js">

    </script>
</body>

</html>