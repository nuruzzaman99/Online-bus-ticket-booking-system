<?php
$name = $_POST['uname'];
$type = $_POST['type'];

$conn = mysqli_connect('localhost','root','','bustics') or die('Error connecting to MySQL server.');

if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

$name = stripcslashes($name);  
$name = mysqli_real_escape_string($conn, $name);  

$sql = "SELECT * FROM `login` WHERE name = '$name' AND type='$type'";

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  

$sql2 = "UPDATE `login` SET `type`='$type' WHERE name='$name'";

$result = mysqli_query($conn, $sql2);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 


$sql3 = "UPDATE `registration` SET `type`='$type' WHERE email='$name'";

$result = mysqli_query($conn, $sql3);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

header( "refresh:0 ;url=admin_page.php" );
    
?>