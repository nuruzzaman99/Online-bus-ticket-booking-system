<?php
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];

$conn = mysqli_connect('localhost','root','','bustics') or die('Error connecting to MySQL server.');

if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

$from = stripcslashes($from);  
$to = stripcslashes($to);  
$date = stripcslashes($date);  
$from = mysqli_real_escape_string($conn, $from);  
$to = mysqli_real_escape_string($conn, $to); 
$date = mysqli_real_escape_string($conn, $date); 

$sql = "SELECT `from`, `to`, `date` FROM `busbooking` WHERE `from` = '$from' AND `to` = '$to' AND date='$date'";

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  

if($count != 0){
    echo "<h1>Route Found.</h1>";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "From : " . $row["from"]. "--To : " . $row["to"]. "--Date : " . $row["date"]. " ";
    }
    header( "refresh:3 ;url=user_page2.php" ); 
}  
else{  
    echo "<h1>Route not Found Or Bus not available on that date.</h1>";
    header( "refresh:3 ;url=User_page.html" ); 
}   

?>
