<?php
session_start();

if (empty($_SESSION['login'])) {
	echo "<script type='text/javascript'>alert('Please login first to access this page');</script>";
	echo "<script type='text/javascript'> window.location.href='../index.html';</script>";
	exit();
}
?>
<html style="background-image:url(i3.jpg);"><head><title>Goods Donation</title>
<link rel="stylesheet" href="style.css">
	<style>
	tbody tr {
background: url(3.png);

}
	</style>

</head>
<body>


 <?php
$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");



$uname=$_SESSION['login'];
$dsn=$_POST["description"];
$bgp=$_POST["blood"];
$d=$_POST["ddate"];
$qty=$_POST["qty"];
$mbno=$_POST["mobileno"];
$emid=$_POST["emailid"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT description from Itemrequests where description='$dsn'";
$result1= $conn->query($sql1);
if($result1->num_rows >-1)
{

$sql = "INSERT INTO Itemrequests (username,description,item_group,Mobile_no,Email_id,deadline,quantity)
VALUES ('$uname','$dsn','$bgp','$mbno','$emid','$d','$qty')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql = "SELECT Name,Email,Phone,Address,Itemgroup from Individual where Itemgroup='$bgp' and q1='yes'" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th> <th>Item Group</th></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td> ".$row["Phone"]."</td><td>".$row["Address"]. "</td><td>".$row["Itemgroup"]."</td></tr>";
    }
    echo "</table>";
} else {
    
    echo "<script type='text/javascript'> alert('Your Request has been registered but there are no matching registered item donors!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

$conn->close();
}

else
{
	

$conn->close();
  echo "<script type='text/javascript'> alert('This Item Request was already registered!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";


}

?> 

</body>
</html> 
