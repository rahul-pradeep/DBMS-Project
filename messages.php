<html>
<body>


 <?php
$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");

$n=$_POST["name"];
$em=$_POST["email"];
$msg=$_POST["message"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO messages (name,email,message)
VALUES ('$n','$em','$msg')";

if ($conn->query($sql) === TRUE) {
    header("Location:index.html"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 

</body> 
</html> 
