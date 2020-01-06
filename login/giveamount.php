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
$fn=$_POST["fname2"];
$amt=$_POST["amount"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$a="SELECT famount FROM Fundraiser WHERE fundraisername='$fn'"; 
$result = $conn->query($a);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a2=$row["famount"];
    }
} 
else {
	$conn->close();
     echo "<script type='text/javascript'>alert('Invalid Fundraiser name!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

if($a2<=0)
{
    echo "<script type='text/javascript'>alert('Fundraiser Amount is already reached. Thank You for your consideration');</script>";
    echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
    exit();
}

$a1=$a2-$amt;
if($a1<0)
{
    $a1=0;
    $amt=$a2;
}

$q1="UPDATE Fundraiser SET famount='$a1' WHERE fundraisername='$fn'";

if ($conn->query($q1) === TRUE) {
   
} else {
    echo "Error: " . $q1 . "<br>" . $conn->error;
}


$sq="SELECT username,fundraisername,amt FROM Donations where username='$uname' AND fundraisername='$fn'";
$res=$conn->query($sq);
if($res->num_rows ==0)
{


$sql = "INSERT INTO Donations (username,fundraisername,amt)
VALUES ('$uname','$fn','$amt')";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('Donated successfully!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
  
}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

else
{
	 while($row1 = $res->fetch_assoc()) {
        $amt1=$row1["amt"];
    }
    $amt2=$amt1+$amt;
    $sq2="UPDATE Donations SET amt='$amt2' WHERE fundraisername='$fn' AND username='$uname'";
    $res2=$conn->query($sq2);
    echo "<script type='text/javascript'>alert('Donated successfully!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
$conn->close();
}

?> 

</body>
</html> 
