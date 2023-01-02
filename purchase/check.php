<?php
$conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
$getQuery = "SELECT * FROM vendorlist";

$result = mysqli_query($conn, $getQuery);

//display the retrieved result on the webpage  






$ar = [];
$i = 0;
while ($row = mysqli_fetch_array($result)) {

    echo $row['id'];
  
}

?>