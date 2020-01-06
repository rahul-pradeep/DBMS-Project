<?php
session_start();

if (empty($_SESSION['login'])) {
	echo "<script type='text/javascript'>alert('Please login first to access this page');</script>";
	echo "<script type='text/javascript'> window.location.href='../index.html';</script>";
	exit();
}
?>
<html>
<body>


 <?php
$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");


$uname=$_SESSION['login'];
$cn=$_POST["cname"];
$no=$_POST["cno"];
$desn=$_POST["cdescription"];
$dd=$_POST["cddate"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT cname from Campaigns where cname='$cn'";
$result1= $conn->query($sql1);
if($result1->num_rows ==0)
{


$sql = "INSERT INTO Campaigns (username,cname,cdescription,number,cdeadline)
VALUES ('$uname','$cn','$desn','$no','$dd')";

if ($conn->query($sql) === TRUE) {
$conn->close();
      echo "<script type='text/javascript'> alert('Successfully registered Social Campaign Request!'); </script> ";
      echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
   
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else
{
	

$conn->close();
  echo "<script type='text/javascript'> alert('The same Social Campaign Request was already registered!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";


}
?> 

</body>
</html> 
