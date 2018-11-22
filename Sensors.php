<html>
<head>
</head>
<body>
<?php

$Conn = new mysqli ('localhost','root','2871');

if ($Conn->connect_error)
{
  die("Connection Failed: ". $Conn->connectt_error);
}
echo "DB Connected Successfully";
echo "<br />";

session_start();
$user = $_SESSION['C_ID'];
mysqli_select_db($Conn,"gp1");
if (isset($_POST['update'])) {
  $UpdateQuery = "UPDATE lights SET Temperature='$_POST[Temperature]', Humidity='$_POST[Humidity]' WHERE ID='$_POST[hidden]'";
  mysqli_query($Conn,$UpdateQuery);
};

$sql = "SELECT lights.ID, lights.C_ID, lights.Temperature, lights.Humidity, lights.Time
FROM lights
INNER JOIN registration ON lights.C_ID=registration.ID WHERE lights.C_ID = $user ";

//$sql="SELECT * FROM lights";
$sensors = mysqli_query($Conn, $sql);

echo "<table border=1>
<tr>
<th>ID</th>
<th>C_ID</th>
<th>Temperature</th>
<th>Humidity</th>
<th>Time</th>
</tr>";

while ($record = mysqli_fetch_array($sensors)) {
  echo "<form action = Sensors.php method = post>";
  echo "<tr>";
  echo "<td>" . $record['ID'] . "</td>";
  echo "<td>" . $record['C_ID'] . "</td>";
  echo "<td>" . "<input type=text name=Temperature value=" . $record['Temperature'] . " </td>";
  echo "<td>" . "<input type=text name=Humidity value=" . $record['Humidity'] . " </td>";
  echo "<td>" . $record['Time'] . "</td>";
  echo "<td>" . "<input type=hidden name=hidden value=" . $record['ID'] . " </td>";
  echo "<td>" . "<input type=submit name=update value=update" . " </td>";
  echo "</form>";
}

echo "</table>";
mysqli_close($Conn);
?>
</body>
</html>
