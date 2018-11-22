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

//create insert query
$sql="INSERT INTO registration (FirstName,LastName,Username,Password,Email,PhoneNumber) VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[Username]','$_POST[Password]','$_POST[Email]','$_POST[PhoneNumber]')";

if ($Conn->query($sql) === TRUE)
{
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $Conn->error;
}

mysqli_close($Conn);

?>
</body>
</html>
