<?php

$query1 = "INSERT INTO `purchase` (`reqNumber`,`userId`,`category`,`subcategory`,`reqType`,`state`,`reqDetails`,`place`) VALUES (5556,555,4,'Browser','Non-Emergency','MARKETING','test requirements',1);";
$conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
$sql = mysqli_query($conn, $query1);

if ($conn) {
    echo 'success';
} else {
    echo 'failed';
}
?>