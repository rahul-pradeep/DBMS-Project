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
$servername = "localhost";
$username = "rahul";
$password = "Rahul99@";
$dbname = "db_project";


$uname=$_SESSION['login'];
$fn=$_POST["fname"];
$amt=$_POST["famt"];
$desn=$_POST["fdescription"];
$dd=$_POST["fddate"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT fundraisername from Fundraiser where fundraisername='$fn'";
$result1= $conn->query($sql1);
if($result1->num_rows ==0)
{



$sql = "INSERT INTO Fundraiser (username,fundraisername,fdescription,famount,fdeadline)
VALUES ('$uname','$fn','$desn','$amt','$dd')";

if ($conn->query($sql) === TRUE) {
	$conn->close();
    echo "<script type='text/javascript'>alert('Fundraiser request registered successfully!');</script>";
    echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>"; 
				 exit;
    
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else
{

$conn->close();
echo "<script type='text/javascript'>alert('The same Fundraiser request was already registered!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}
?> 

</body>
</html> 
