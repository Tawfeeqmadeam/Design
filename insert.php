<?php
include "connected.php";

if(isset($_POST['polygon'])){

    $sql = "INSERT INTO `polygon` (`userID`,`points`)";
    $sql .= "VALUES('" . $_POST['user'] . "','" . $_POST['polpoints'] . "')";
    $result = $db->query($sql);

}






if(isset($_POST['rect'])){
    $arr_x = $_POST['x'];
    $arr_y = $_POST['y'];
    $arr_style = $_POST['styles'];
    for($i=0;$i<count($arr_x);$i++){
    $sql = "INSERT INTO `rect` (`userID`,`x`,`y`,`style`)";
    $sql .= "VALUES('" . $_POST['user'] . "','" . $arr_x[$i] .  "','" . $arr_y[$i] .  "','" .$arr_style[$i] . "')";
    echo $sql;
    $result = $db->query($sql);
  
    }

}




?>