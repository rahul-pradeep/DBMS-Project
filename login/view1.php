<?php
session_start();

if (empty($_SESSION['login'])) {
	echo "<script type='text/javascript'>alert('Please login first to access this page');</script>";
	echo "<script type='text/javascript'> window.location.href='../index.html';</script>";
	exit();
}
?>
<html style="background-color:  rgb(26, 188, 156);">
	<head>
	<link rel="stylesheet" href="style.css">
	<style>

	tbody tr, tbody th, tbody td  {
        color:white;
        border: 3.5px solid white;

        
}   
	</style>

	</head>
<body>


 <?php
$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username,fundraisername,fdescription,famount,fdeadline FROM Fundraiser where famount>0";

/*if ($conn->query($sql) == TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Publisher Username</th><th>Fundraiser Name</th><th>Description</th><th>Amount Required</th><th>Deadline</th></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["fundraisername"]."</td><td>".$row["fdescription"]."</td><td> ".$row["famount"]."</td><td>".$row["fdeadline"]. "</td></tr>";
    }
    echo "</table>";
} else {
     echo "<script type='text/javascript'> alert('No ongoing Fundraisers!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}


$conn->close();
?> 

</body>
</html> 
