<?php
include "connected.php";
if(isset($_POST['user'])){

    $sql = "INSERT INTO `polygon` (`userID`,`points`)";
    $sql .= "VALUES('" . $_POST['user'] . "','" . $_POST['polpoints'] . "')";
    $result = $db->query($sql);

}


?>