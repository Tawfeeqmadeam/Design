<?php
include "connected.php";

if(isset($_POST['polygon'])){

    $sql = "INSERT INTO `polygon` (`roomID`,`points`)";
    $sql .= "VALUES('" . $_POST['room'] . "','" . $_POST['polpoints'] . "')";
    $result = $db->query($sql);

}
if(isset($_POST['rect'])){
    $arrR_x = $_POST['x'];
    $arrR_y = $_POST['y'];
    $arrR_style = $_POST['styles'];
    $arrR_width = $_POST['widths'];
    $arrR_height = $_POST['heights'];
    for($i=0;$i<count($arrR_x);$i++){
    $sql = "INSERT INTO `rect` (`roomID`,`x`,`y`,`style`,`width`,`height`)";
    $sql .= "VALUES('" . $_POST['room'] . "','" . $arrR_x[$i] .  "','" . $arrR_y[$i] .  "','" .$arrR_style[$i] . "'
                    ,'" . $arrR_width[$i] . "','" . $arrR_height[$i] . "')";
    echo $sql;
    $result = $db->query($sql);
  
    }

}
if (isset($_POST['image'])) {
    $arr_x = $_POST['imageX'];
    $arr_y = $_POST['imageY'];
    $arr_href = $_POST['imageHref'];
    $arr_width = $_POST['imageWidth'];
    $arr_height = $_POST['imageHeight'];

    for ($i = 0; $i < count($arr_x); $i++) {
        $sql = "INSERT INTO `images` (`roomID`,`imageX`,`imageY`,`href`,`imageWidth`,`imageHeight`)";
        $sql .= "VALUES('" . $_POST['room'] . "','" . $arr_x[$i] .  "','" . $arr_y[$i] .  "','" . $arr_href[$i] . "','" . $arr_width[$i] . "','" . $arr_height[$i] . "')";
        echo $sql;
        $result = $db->query($sql);
    }
}
?>