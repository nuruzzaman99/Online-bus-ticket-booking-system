<?php
$username = $_POST['uname'];
$password = $_POST['pass'];
$loginas = $_POST['loginas'];

$conn = mysqli_connect('localhost','root','','bustics') or die('Error connecting to MySQL server.');

if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

$username = stripcslashes($username);  
$password = stripcslashes($password);  
$loginas = stripcslashes($loginas);  
$username = mysqli_real_escape_string($conn, $username);  
$password = mysqli_real_escape_string($conn, $password); 
$loginas = mysqli_real_escape_string($conn, $loginas); 

$sql = "SELECT * FROM `login` WHERE name = '$username' AND password = '$password' AND type='$loginas'"; 

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);

session_start();
$_SESSION['email'] = $username;

?>
<html>
    <body>
<?php
$logas = "admin";
    if($count != 0){
        if($loginas !=$logas){  
            echo "<h1><center> Login successful </center></h1>";?>
            <img src="handshake.jpg" alt="Italian Trulli">
            <?php header( "refresh:2 ;url=User_page.html" );
        }
        else{
            header( "refresh:0 ;url=admin_page.php" ); 
        }
             
    } 
    else{
        echo "<h1> Login failed. Invalid username or password.</h1>";
    }

?>
    </body>
</html>
