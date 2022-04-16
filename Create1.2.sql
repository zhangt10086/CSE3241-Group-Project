create database if not exists PARKINGMASTER;

use PARKINGMASTER;

create table CUSTOMER (
Customer_id int not null,
Name varchar(20) not null,
Password varchar(30) not null,
Login varchar(30) not null,
Phone varchar(13),
Primary Key (Customer_id));

create table GARAGE (
Garage_id int not null,
Garage_Name varchar(50) not null,
Address varchar(50) not null,
NumSpace int not null,
Primary key (Garage_id));

create table EVENT (
Event_id int not null,
Event_Name varchar(20) not null,
Venue varchar(50) not null,
Primary key(Event_id));

create table VENUE_DIST (
Garage_id int not null,
Event_id int not null,
Venue_Dist int not null,
Fee smallint not null,
Foreign key(Garage_id) references GARAGE(Garage_id),
Foreign key(Event_id) references EVENT(Event_id));

create table EVENT_DAYS (
Event_id int not null,
Day date not null,
Primary key(Day),
Foreign key(Event_id) references EVENT(Event_id));

create table RESERVATION (
Garage_id int not null,
Event_id int not null,
Customer_id int not null,
Day date,
is_Cancelled boolean not null,
Foreign key (Customer_id) references CUSTOMER(Customer_id),
Foreign key (Garage_id) references GARAGE(Garage_id),
Foreign key (Event_id) references EVENT(Event_id),
Foreign key (Day) references EVENT_DAYS(Day));

create user VENADMIN@'%' identified by 'venadmin';
create user PARADMIN@'%' identified by 'paradmin';
grant all on PARKINGMASTER.* to VENADMIN@'%';
grant all on PARKINGMASTER.* to PARADMIN@'%';
