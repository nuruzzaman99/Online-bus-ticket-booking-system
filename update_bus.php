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
?>

<?php
    if($count != 0){
        echo "<h1>Already in Schedule.</h1>";
        header( "refresh:0 ;url=admin_page.php" );      
    }  
    else{
        $query = "INSERT INTO `busbooking`(`from`, `to`, `date`) VALUES ('$from', '$to', '$date')";

        $result = mysqli_query($conn, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        echo "<h1>Added.</h1>";
        header( "refresh:0 ;url=admin_page.php" );  
    }   
?>