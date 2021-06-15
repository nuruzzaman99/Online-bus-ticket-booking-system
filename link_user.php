  <!DOCTYPE html>
<html>
    <head>
        <title>BusTics.bd.com</title>
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body>
        <ul>
            <div class="logo">BusTics.BD </div>
            <li><a href="admin_page.php">About</a></li>
            <li><a href="Registration_page.html">Registration</a></li>
            <li><a href="login_page.html">Login</a></li>
            <li><a href="Home_page.html">Home</a></li>
        </ul>
     <marquee>***All over Bangladesh, our service is available.***</marquee>
<?php
$type = $_POST['submit'];

if($type != "home"){
    header( "refresh:0 ;url=serach_bus.php");
}
else{
    ?>
    <div class="cover">
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
            $result = $conn->query($sql);
            ?>
             <lable><h1>Bus available :</h1></lable>
             <?php
            while($row = $result->fetch_assoc()) {
                echo "From : <b>" . $row["from"]. "</b>--To : <b>" . $row["to"]. "</b>--Date : <b>" . $row["date"]. "</b><br>";
            }
            ?>
             <a href="login_page.html"><button>Login</button></a>
             <?php
        }  
        else{  
            echo "<h1>Bus not available on that Date or Route.</h1>";
        }   

        ?>
        </div>
        <div class = "font">Book Your Tictkets Now</div>
    <div class="cover">
        
    <form action="link_user.php" action="" method="POST">
      <select placeholder="from" name="from" required>
        <option>From </option>
        <option value="Dhaka">Dhaka</option>
        <option value="Mirpur">Mirpur</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Gabtoli">Gabtoli</option>
        <option value="Mohakhali">Mohakhali</option>
        <option value="Kollanpur">Kollanpur</option>
        <option value="Pabna">Pabna</option>
        <option value="Sirajgonj">Sirajgonj</option>
        <option value="Khulna">Khulna</option>
        <option value="Chottogram">Chottogram</option>
        <option value="Chapainobabgonj">Chapainobabgonj</option>
        <option value="Sylet">Sylet</option>
        <option value="Cox-Bazar">Cox-Bazar</option>
        <option value="Kuakata">Kuakata</option>
      </select>
        
      <select placeholder="to" name="to" required>
        <option>To</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Mirpur">Mirpur</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Gabtoli">Gabtoli</option>
        <option value="Mohakhali">Mohakhali</option>
        <option value="Kollanpur">Kollanpur</option>
        <option value="Pabna">Pabna</option>
        <option value="Sirajgonj">Sirajgonj</option>
        <option value="Khulna">Khulna</option>
        <option value="Chottogram">Chottogram</option>
        <option value="Chapainobabgonj">Chapainobabgonj</option>
        <option value="Sylet">Sylet</option>
        <option value="Cox-Bazar">Cox-Bazar</option>
        <option value="Kuakata">Kuakata</option>
      </select><br>
      <input type="date" name="date" required><br>
      <button type="submit" name="submit" value="home" >Search</button>
      <br><button type="button" class="cancelbtn">Cancel</button><br>
    </form>
         
        Have an account?<a href="login_page.html">Sign in!</a>
         
        <br>
        <p>Create an account? <a href="Registration_page.html">Sign up</a>.</p>
       
    </div>
<!-- Footer container -->
        <footer>  
        <h3>Md. Nuruzzaman</h3>  
        <p>© Copyright 2020.</p>
        </footer>
    </body>
</html>
<?php
}
?>