drop table if exists Individual
drop table if exists Orgs

create table Individual (
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) unique not null,
	password varchar(255) not null,
	Name varchar(50) not null,
	Email varchar(50) not null,
	DOB varchar(20),
	Age int not null,
	Phone int,
	Address varchar(100),
	Bloodgroup varchar(5),
	q1 varchar(4),
	q2 varchar(4),
	q3 varchar(250)
	);



