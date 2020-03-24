drop table if exists Individual;
drop table if exists Orgs;
drop table if exists messages;
drop table if exists Fundraiser;
drop table if exists Campaigns;
drop table if exists Donations;
drop table if exists Volunteers;
drop table if exists Itemrequests;



create table Individual (
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
	);

create table Orgs(
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) unique not null,
	password varchar(100) not null,
	Oname varchar(50) not null,
	Odescription varchar(300) not null,
	Oemail varchar(50) not null,
	Oaddress varchar(250) not null,
	Ophone varchar(50) not null
	);


create table messages(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(50) not null,
	email varchar(100) not null,
	message varchar(300) not null
	);


create table Fundraiser (
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) not null unique,
	fundraisername varchar(50) not null,
	fdescription varchar(300) not null,
	famount varchar(50) not null,
	fdeadline varchar(50) not null
	);

create table Campaigns(
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) not null,
	cname varchar(100) not null,
	cdescription varchar(300) not null,
	number int not null,
	cdeadline varchar(50) not null
	);

create table Volunteers(
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) not null,
	cname varchar(100) not null
	);

create table Donations(
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) not null,
	fundraisername varchar(50) not null,
	amt varchar(50) not null
	);

create table Itemrequests(
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) not null,
	description varchar(300) not null,
	item_group varchar(100) not null,
	Mobile_no varchar(50) not null,
	Email_id varchar(50) not null,
	deadline varchar(50) not null,
	quantity varchar(50) not null
	);	
