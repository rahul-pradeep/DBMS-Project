<html>
<body>


 <?php

 error_reporting(E_ALL);
 ini_set('display_errors',1);

$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");

$pn=$_POST["mobile"];
$un=$_POST["username"];
$pw1=$_POST["password"];
$fn=$_POST["first_name"];
$ln=$_POST["last_name"];
$mail=$_POST["email"];
$bl=$_POST["blood"];
$dob=$_POST["dob"];
$age=$_POST["age"];
$hno=$_POST["housenumber"];
$street=$_POST["street"];
$city=$_POST["city"];
$pin=$_POST["pin"];
$state=$_POST["state"];
$name=$fn.' '.$ln;
$address=$hno.' '.$street.' '.$city.' '.$pin.' '.$state;
$q1=$_POST["group1"];
$q2=$_POST["group2"];
$q3=$_POST["comments"];
$pw=md5($pw1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT username from Individual where username='$un'";
$result1= $conn->query($sql1);
$sql2="SELECT username from Orgs where username='$un'";
$result2= $conn->query($sql2);
$r1=$result1->num_rows;
$r2=$result2->num_rows;
$sum=$r1+$r2;
if ($sum == 0) {

$sql = "INSERT INTO Individual (username,password,Name, Email,DOB,Age,Phone,Address,Itemgroup,q1,q2,q3)
VALUES ('$un','$pw','$name','$mail','$dob','$age','$pn','$address','$bl','$q1','$q2','$q3')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location:login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

				  
				 exit;
 
}

else
{

$conn->close();
echo "<script type='text/javascript'>alert('Username already exists!');</script>";
 echo "<script type='text/javascript'> window.location.href='register.html';</script>";

}
?> 

</body>
</html> 
