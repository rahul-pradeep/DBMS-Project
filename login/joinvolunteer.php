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
$cn=$_POST["cname2"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$s1="SELECT username,cname FROM Volunteers where username='$uname' AND cname='$cn'";
$res = $conn->query($s1);
if ($res->num_rows == 0) {

$a="SELECT number FROM Campaigns WHERE cname='$cn'";

    $result = $conn->query($a);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $a2=$row["number"];
    }

    if($a2<=0)
    {
        echo "<script type='text/javascript'>alert('Volunteer for Campaign is full');</script>";
        echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
        exit();
    }
    $a1=$a2-1;

    $q1="UPDATE Campaigns SET number='$a1' WHERE cname='$cn'";

    if ($conn->query($q1) === TRUE) {
   
    } else {
        echo "Error: " . $q1 . "<br>" . $conn->error;
    }



    $sql = "INSERT INTO Volunteers (username,cname)
    VALUES ('$uname','$cn')";

    if ($conn->query($sql) === TRUE) {
	    $conn->close();
	    echo "<script type='text/javascript'>alert('Successfully joined as a volunteer!!');</script>";
        echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
	
  
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
    }
}
else {
    echo "<script type='text/javascript'>alert('Invalid Campaign name!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

}
else
{
	

$conn->close();
  echo "<script type='text/javascript'> alert('You have already registered as a volunteer for this campaign!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";


}

   

?> 

</body>
</html> 
