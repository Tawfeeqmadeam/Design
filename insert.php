<?php 
include "connected.php";

if(isset($_GET['name'])){
    $name1=$_GET['name'];
    $email=$_GET['email'];
    $pass=$_GET['psw'];
       $f= $r->insert($name1, $email, $pass);
       if($f)
       echo "yes";
       else
       echo "no";
}
