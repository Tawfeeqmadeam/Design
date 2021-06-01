<?php
include "connected.php";

session_start();
if (isset($_SESSION['ID'])) {
    echo $_SESSION['Username']; // Register Session Name
    echo $_SESSION['ID'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['roomID'])) {
            $sql = "UPDATE room SET `userID` = '" . $_SESSION['ID'] . "' WHERE `roomID` = '" . $_GET['roomID'] . "'";
            $result = $db->query($sql);
        }
    }
}else{
    header('Location:index.php'); 

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

    <div id="user"><?php echo $_SESSION['ID'] ?></div>

    <svg id="theSVG" width="99%" height="700px">
        <polygon id="polygon" points="0,0 400,0 400,400 0,400" stroke="purple" stroke-width="0" class="eee" transform="translate(550,250)">

        </polygon>
        <rect class="rect END2" id="1" x="555" z-index="5" y="253" width="100" height="100" style="fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)"></rect>
        <rect class="rect END2" id="2" x="710" y="255" width="100" height="100" style="fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)"></rect>
        <rect class="rect END2" id="3" x="555" z-index="5" y="253" width="100" height="100" style="fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)"></rect>

        <rect class="rect1 END2" id="4" x="879" y="400" width="70" height="100" style="fill:rgb(158, 146, 138);stroke-width:3;stroke:rgb(139,69,19)">
        </rect>
        <rect class="rect1 END2" id="5" x="700" y="252" width="100" height="40" style="fill:rgb(204, 194, 188);stroke-width:3;stroke:rgb(139,69,19)">
        </rect>
        <rect class="rect1 END2" id="6" x="700" y="619" width="100" height="40" style="fill:rgb(204, 194, 188);stroke-width:3;stroke:rgb(139,69,19)">
        </rect>
        <rect class="END2" id="bab" x="950" y="400" width="10" height="100" style="fill:rgb(0, 255, 42);stroke-width:3;stroke:rgb(0,0,0)">
        </rect>
        <rect class="END2" id="window" x="700" y="240" width="100" height="10" style="fill:rgb(184, 233, 7);stroke-width:3;stroke:rgb(0,0,0)">
        </rect>
        <rect class="END2" id="window1" x="700" y="651" width="100" height="10" style="fill:rgb(184, 233, 7);stroke-width:3;stroke:rgb(0,0,0)">
        </rect>
        <g width="100" height="10">
            <path d="M476.688,0L239.525,42.035v-0.281L2.919,0.05v479.278l236.605-53.117v-0.104l237.163,53.5L476.688,0L476.688,0z
		 M39.161,250.069c-7.166,0-12.973-7.199-12.973-16.08c0-8.879,5.807-16.079,12.973-16.079s12.975,7.2,12.975,16.079
		C52.136,242.869,46.327,250.069,39.161,250.069z M447.836,443.859l-191.13-41.289v-28.866h4.094v-47.022h-4.094V152.13h4.094
		v-47.021h-4.094V66.601l191.13-32.439V443.859z" />
        </g>
    </svg>
    <div class="tools">
        <div class="room"><img src="iconRoom.png"></div>
        <div><button id="otherChange">other </button></div>
        <div><button id="end">END </button></div>

    </div>
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


    <script src="js/index.js">

    </script>
</body>

</html>