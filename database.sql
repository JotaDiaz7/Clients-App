create database clientApp;

use clientApp;

create table users(
	user varchar(10) not null,
	name varchar(100) not null,
	address varchar(500),
	birth varchar(20),
	dni char(9) not null,
	sex varchar(10),
	date date,
	phone varchar(9),
	constraint user_pk primary key (user),
	constraint dni_uk unique (dni),
	constraint sex_ck check (sex in ("Man", "Woman"))
);

INSERT INTO users(user, name, dni) VALUES ('14df', 'Jota Díaz', "74356825Y");

create table comments(
	userID varchar(10),
	comment varchar(700),
	time varchar(50),
	date date,
	constraint userID_fk foreign key (userID) references users(user)
);