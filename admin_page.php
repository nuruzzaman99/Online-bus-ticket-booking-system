<html>
<head>
    <title>Bustics.com/Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bustics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
    <body>
        
        <ul>
            <div class="logo">BusTics.BD </div>
            <li><a href="Registration_page.html">Registration</a></li>
            <li><a href="login_page.html">Logout</a></li>
            <li><a href="Home_page.html">Home</a></li>
        </ul>
        <marquee>***Admin page***</marquee>
        <div class="showbus">
            <center>
           
            <label><h1><?php 
        echo "Today's date is :"; 
        $today = date("d/m/Y"); 
        echo $today . "\n\n";
        ?> </h1></label>
                 </center>
        </div>
        
        <table width="100%">
            <tr>
                <th>
                    <div class="showbus">
                        <form action="update_bus.php" method="POST">
                            <lable><h1>Update Bus Schedule :</h1></lable>
                            <select name="from" required>
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

                          <select name="to" required>
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
                            <button type="submit">Add</button> 
                        </form>
                    </div>
                    <div class="showbus">
                          <lable><h1>List Of Buses available :</h1></lable>
                            <?php
                            $sql = "SELECT * FROM `busbooking` WHERE 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                                echo "<br>";
                              while($row = $result->fetch_assoc()) {
                                echo "From : " . $row["from"]. "--To : " . $row["to"]. "--Date : " . $row["date"]. "<br>";
                              }
                            } else {
                              echo "0 results";
                            }
                            ?>
                    </div>
                </th>

                
                <th>
                <form action="update_data.php" method="POST">
                     <div class="busbooking">
                         <lable><h1>Update Admin Base :</h1></lable>
                        <label>Email : </label>
                        <br>
                        <input type="text" placeholder="Enter Email" name="uname" required>   
                        <br>
                        <label>Account type : </label>
                        <select name="type">  
                            <option value="member">User</option>
                            <option value="admin">Admin</option>
                        </select>
                         <br>
                            <button type="submit">Add</button> 
                    </div>
                </form>
                </th>

                <th>
                     <div class="busbooking">
                         <lable><h1>List Of Admin :</h1></lable>
                        <?php
                        $sql2 = "SELECT * FROM `login` WHERE 1 ";
                        $result = $conn->query($sql2);

                        if ($result->num_rows > 0) {
                          // output data of each row
                            echo "<br>";
                          while($row = $result->fetch_assoc()) {
                            echo "<h3>Name : " . $row["name"]. " || As : " . $row["type"]. "</h3>";
                          }
                        } 
                        else {
                          echo "0 results";
                        }
                        $conn->close();
                        ?>

                    </div>
                </th>
            </tr>
        </table>
       



        
        <!-- Footer container -->
    <footer class="footer">  
        <h3>Md. Nuruzzaman</h3>  
        <p>© Copyright 2020.</p>
    </footer>
    </body>
</html>