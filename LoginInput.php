<html>
<body>
<?php

//create connection
$Conn = new mysqli ('localhost','root','2871');

//check connection
if ($Conn->connect_error)
{
  die("Connection Failed: ". $Conn->connectt_error);
}

  echo "DB Connected Successfully";

//this will select the Databae
mysqli_select_db($Conn,"gp1");
echo "<br> DB is selected as Test Successfully <br>";

//select from Databae
$sql="SELECT * FROM registration WHERE Username='$_POST[Username]' and Password='$_POST[Password]'";
$result=mysqli_query($Conn, $sql);
$user = mysqli_fetch_array($result);
$temp = implode(" ",$user);
$C_ID = substr($temp,2,1);
echo "$C_ID";

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    session_start();
    $_SESSION['C_ID'] = $C_ID;
    header('Location: Sensors.php');
} else {
    echo "Unsuccessful! $count";
}

ob_end_flush();
mysqli_close($Conn);
?>
</body>
</html>
