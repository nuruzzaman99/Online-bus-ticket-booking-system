<!DOCTYPE html>
<html>
    <head>
        <title>BusTics.bd.com</title>
        <link rel="stylesheet" type="text/css" href="user.css">
    </head>
    
    <body>
        <ul>
            <div class="logo">BusTics.BD </div>
            <li><a>About</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="Home_page.html">Logout</a></li>
            <li><a href="Home_page.html">Home</a></li>
            <li><a href="User_page.html">Back</a></li>
        </ul>
    <marquee >***All over Bangladesh, our service is available.***</marquee>
    <div class="cover2">
    <?php
    $conn = mysqli_connect('localhost','root','','bustics') or die('Error connecting to MySQL server.');

    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
        
    session_start();
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $email = $_SESSION['email'];
    
    $sql = "SELECT `first_name`, `last_name`, `phone`, `email` FROM `registration` WHERE email= '$email'";
        
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);

    if($count != 0){
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<lable><b>Name : " . $row["first_name"]. " " . $row["last_name"]. "<br>Phone : " . $row["phone"]. "<br>Email : " . $row["email"]. "</b></lable><br>";
        }
    }
    echo "<lable><b>" .$from ." " . $to . " " . $date . "</b></lable>";
        
    $sql = "INSERT INTO `bus_book`(`email`, `from`, `to`, `date`) VALUES ('$email', '$from', '$to', '$date')";
    $conn->query($sql);
    $conn->close();    
    ?>
    <br>
    <label>Tk: 700.00TK</label>
    </div>
    <div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1914228009687!2d90.35472651536344!3d23.811791192344252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c12015382851%3A0x3ceca92fcf1a72d2!2sBangladesh%20University%20of%20Business%20and%20Technology%20(BUBT)!5e0!3m2!1sen!2sbd!4v1602190579281!5m2!1sen!2sbd" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <br>
    <br>
<!-- Footer container -->
        <footer style="background-color: #f0f8ff; width: 100%; text-align: center;"> 
        <h3>Md. Nuruzzaman</h3>  
        <p>©Copyright 2020.</p>
    </footer>
    </body>
</html>