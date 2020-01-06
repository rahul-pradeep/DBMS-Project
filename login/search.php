<html style="background-image:url(i3.jpg);"><head><title>Blood Donation</title>
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


$bgp=$_POST["itemgp"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT username,item_group,Mobile_no,Email_id,deadline,quantity FROM Itemrequests where item_group='$bgp'" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Username</th><th>Item Group</th><th>Mobile No:</th><th>Email ID</th><th>Deadline</th><th>Quantity</th></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td> ".$row["item_group"]."</td><td>".$row["Mobile_no"]. "</td><td>".$row["Email_id"]. "</td><td>".$row["deadline"]. "</td><td>".$row["quantity"]."</td></tr>";
    }
    echo "</table>";
} else {
     echo "<script type='text/javascript'> alert('No matching Item Group Requests!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

$conn->close();


?> 

</body>
</html> 
