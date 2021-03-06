<?php
$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (empty($_SESSION['login'])) {
	echo "<script type='text/javascript'>alert('Please login first to access this page');</script>";
	echo "<script type='text/javascript'> window.location.href='../index.html';</script>";
	exit();
}

$sql = "SELECT Name FROM Individual where username='{$_SESSION['login']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row['Name'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>HOME</title>
		<meta charset="utf-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		 <link rel="stylesheet" href="css/font-awesome.min.css"/>
		 <link rel=stylesheet href="https://fonts.googleapis.com/css?family=Lato:300,700,300italic,700italic"/>
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="">Home</a></li>
					<li><a href="#one">GOODS DONATION</a></li>
					<li><a href="#two">FUND RAISER</a></li>
					<li><a href="#three">VOLUNTEER REQUESTS</a></li>
					<li><a href="../reg/change.html">CHANGE PASSWORD</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<?php echo "<h3>Hi, $name</h3>"; ?>
					<h1> Stay with us to help those in need.</h1>
					<ul class="actions">
						<li><a href="#one" class="button alt scrolly big">Continue</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<article id="one" class="post style1">
				<div class="image">
					<img src="../images/pic21.jpg" alt="" data-position="50% center" />
				</div>
				<div class="content">
					<div class="inner">
						<form action="bloodrequests.php" method="post" class="f2">
<div style="text-align: center;"><b><h3>Searching for Donors?</h3></b></div>
<!--Username:    <input type="text" name="uname"><br> -->
Description: <input type="text" name="description"><br>
Item Group: <select name="blood"><option value="FOOD">FOOD</option><option value="CLOTH">CLOTH</option><option value="MEDICINE">MEDICINE</option><option value="WATER">WATER</option>
<option value="BAND-AIDS">BAND-AIDS</option><option value="UTENSILS">UTENSILS</option><option value="CLEANERS">CLEANERS</option><option value="FUEL">FUEL</option></select>
<br>
Contact Details: <input type="text" name="mobileno"><br>
Email ID: <input type="text" name="emailid"><br>
Deadline:    <input type="date" name="ddate"><br>
Quantity:    <input type="number" name="qty"><br>
<!-- Verification -to be given in db but not in front end-->
<button style="align-self: center;" type="submit">SUBMIT REQUEST</button> 
</form>
<form action="search.php" method="post">
                        <div style="text-align: center;"><b><h3>Even the smallest things are invaluable during calamities. <br>Search to find out people you can help!</h3></b></div>
                        Item Group: <select name="itemgp"><option value="FOOD">FOOD</option><option value="CLOTH">CLOTH</option><option value="MEDICINE">MEDICINE</option><option value="WATER">WATER</option>
<option value="BAND-AIDS">BAND-AIDS</option><option value="UTENSILS">UTENSILS</option><option value="CLEANERS">CLEANERS</option><option value="FUEL">FUEL</option></select>
                        <button style="align-self: center;"type="submit">SEARCH</button> 
                        </form>
                        
</div>
					</div>
					<div class="postnav">
						<a href="#" class="prev disabled"><span class="icon fa-chevron-up"></span></a>
						<a href="#two" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
					</div>
				
			</article>

		<!-- Two -->
			<article id="two" class="post invert style1 alt">
				<div class="image">
					<img src="pic15.jpg" alt="" data-position="10% left" />
				</div>
				<div class="content">
					<div class="inner">
						<form action="fundraiser.php" method="post" class="f2">
<div style="text-align: center;"><b><h3>Wish to raise funds for a social cause?</h3></b></div>
<!--Username:    <input type="text" name="ufname"><br> -->
Fundraiser name:    <input type="text" name="fname"><br>                        
Description: <input type="text" name="fdescription"><br>
Amount: <input type="number" name="famt"><br>
Deadline:    <input type="date" name="fddate"><br>
<!-- Verification -to be given in db but not in front end-->
<button style="align-self: center;" type="submit">SUBMIT</button> 
</form>
                        <div style="text-align: center;"><b><h3>Actions speak louder than words! Give today.<br><a href="view1.php">Click here </a>to view the ongoing fundraisers</h3></b></div>
						    
                        <form action="giveamount.php" method="post" class="f3">
<!--Username: <input type="text" name="ufname2"><br >        -->    
Fundraiser Name: <input type="text" name="fname2"><br>
Amount: <input type="text" name="amount"><br>

<button style="align-self: center;" type="submit">DONATE</button> 
</form>
					</div>
					<div class="postnav">
						<a href="#one" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
						<a href="#three" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
					</div>
				</div>
			</article>

		<!-- Three -->
			<article id="three" class="post style2">
				<div class="image">
					<img src="../images/pic18.png" alt="" data-position="80% center" />
				</div>
				<div class="content">
					<div class="inner">
						<form action="volrequests.php" method="post" class="f2">
<div style="text-align: center;"><b><h3>Need Volunteers to host a social event?</h3></b></div>
<!--Username:    <input type="text" name="cuname"><br> -->
Campaign name:    <input type="text" name="cname"><br>
Description: <input type="text" name="cdescription"><br>
Number of volunteers required: <input type="number" name="cno"><br>
Deadline:    <input type="date" name="cddate"><br>

<!-- Verification -to be given in db but not in front end-->
<button style="align-self: center;" type="submit">SUBMIT</button> 
</form>
                    <form action="joinvolunteer.php" method="post">
                        <div style="text-align: center;"><b><h3>Together we can make a difference...<br><a href="view2.php">Click here </a>to view the ongoing social campaigns.</h3></b></div>
                        
                     <!--   Username: <input type="text" name="cuname2"><br >       -->     
Campaign Name: <input type="text" name="cname2"><br>

<button style="align-self: center;" type="submit">JOIN</button> 
                        </form></div>
					<div class="postnav">
						<a href="#two" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
                    </div>
                </div>
			</article>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				</ul>
				<div class="copyright">
					&copy; CALAMITY AID
				</div>
			</footer>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>

	</body>
</html>
