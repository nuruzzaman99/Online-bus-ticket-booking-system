<?php
//Step1
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$currentaddress = $_POST['currentaddress'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$type = "member";

$db = mysqli_connect('localhost','root','','bustics') or die('Error connecting to MySQL server.');

//Step2
$select = "SELECT email FROM `registration` WHERE email=? LIMIT 1";

$query = "INSERT INTO `registration`(`first_name`, `last_name`, `gender`, `phone`, `current_address`, `email`, `password`, `type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$sql = "INSERT INTO `login`(`name`, `password`, `type`) VALUES (?, ?, ?)";

//Step3
$stmt = $db->prepare($select);
$stmt-> bind_param("s", $email);    
$stmt-> execute();    
$stmt-> bind_result($email);    
$stmt-> store_result();    
$rnum = $stmt->num_rows;

if($rnum==0){
    $stmt-> close();
         
    $stmt = $db->prepare($query);
    $stmt-> bind_param("sssissss", $firstname, $lastname, $gender, $phone, $currentaddress, $email, $psw, $type);    
    $stmt-> execute();

    $stmt2 = $db->prepare($sql);
    $stmt2-> bind_param("sss", $email, $psw, $type);    
    $stmt2-> execute();
    header( "refresh:1 ;url=login_page.html" );
}
else{
    echo "This email already used";
    header( "refresh:3 ;url=home_page.html" );
}
//Step 4
mysqli_close($db);
$stmt-> close();  
?>
