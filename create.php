<?php

$servername = getenv("mysql_hostname");
$username = getenv("mysql_username");
$password = getenv("mysql_password");
$dbname = getenv("mysql_database");
$reset_password = getenv("reset_password");

echo "<pre>\n";
if (isset($_POST["key"]) && $reset_password == $_POST["key"]) {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Clear existing tables
    $queries = [
        "Individual" => "drop table if exists Individual",
        "Orgs" => "drop table if exists Orgs",
        "messages" => "drop table if exists messages",
        "Fundraiser" => "drop table if exists Fundraiser",
        "Campaigns" => "drop table if exists Campaigns",
        "Donations" => "drop table if exists Donations",
        "Volunteers" => "drop table if exists Volunteers",
        "Itemrequests" => "drop table if exists Itemrequests",
    ];
    
    echo "Clearing old tables\n";
    foreach ($queries as $table_name => $query) {
        echo "{$table_name}";
        if ($conn->query($query) === TRUE) {
            echo "...OK\n";
        } else {
            echo "Error in clearing table {$table_name}" . $sql . "\n" . $conn->error . "\n";
        }
    }
    echo "\n\n";

    echo "Creating new tables\n";
    // Create new tables
    $queries = [
        "Individual" => "create table Individual (
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) unique not null,
            password varchar(255) not null,
            Name varchar(50) not null,
            Email varchar(50) not null,
            DOB varchar(20),
            Age int not null,
            Phone varchar(20) not null,
            Address varchar(250),
            Itemgroup varchar(50),
            q1 varchar(4),
            q2 varchar(4),
            q3 varchar(250)
            );",
        "Orgs" => "create table Orgs(
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) unique not null,
            password varchar(100) not null,
            Oname varchar(50) not null,
            Odescription varchar(300) not null,
            Oemail varchar(50) not null,
            Oaddress varchar(250) not null,
            Ophone varchar(50) not null
            );",
        "messages" => "create table messages(
            id int PRIMARY KEY AUTO_INCREMENT,
            name varchar(50) not null,
            email varchar(100) not null,
            message varchar(300) not null
            );
        ",
        "Fundraiser" => "create table Fundraiser (
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) not null unique,
            fundraisername varchar(50) not null,
            fdescription varchar(300) not null,
            famount varchar(50) not null,
            fdeadline varchar(50) not null
            );",
        "Campaigns" => "create table Campaigns(
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) not null,
            cname varchar(100) not null,
            cdescription varchar(300) not null,
            number int not null,
            cdeadline varchar(50) not null
            );
        ",
        "Donations" => "create table Volunteers(
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) not null,
            cname varchar(100) not null
            );",
        "Volunteers" => "create table Donations(
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) not null,
            fundraisername varchar(50) not null,
            amt varchar(50) not null
            );",
        "Itemrequests" => "create table Itemrequests(
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100) not null,
            description varchar(300) not null,
            item_group varchar(100) not null,
            Mobile_no varchar(50) not null,
            Email_id varchar(50) not null,
            deadline varchar(50) not null,
            quantity varchar(50) not null
            );",
    ];
    
    foreach ($queries as $table_name => $query) {
        echo "{$table_name}";
        if ($conn->query($query) === TRUE) {
            echo "...OK\n";
        } else {
            echo "Error in creating table {$table_name}" . $sql . "\n" . $conn->error . "\n";
        } 
    }
    echo "\n\n";
} else {
    echo "invalid key\n";
}
echo "</pre>\n";