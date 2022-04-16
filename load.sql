
insert into GARAGE(Garage_id, Garage_Name, Address, NumSpace) values 
(1,'South Union Garage', '1759 N High St', 200),
(2,'North stadium Garage', '411 Woody Hayes Dr',150),
(3,'West stadium Garage', '1801 Cannon Dr', 350),
(4,'Gray Parking Lots 1 & 2', '2100 Neli Ave', 150),
(5,'Lane Avenue Garage North', '322 W lane Ave', 250);



insert into Event(Event_id, Event_Name, Venue) values 
(21,'First Day of Class','The Union'),
(22,'Game Night','Stadium'),
(23,'Final week','18th Ave Libary'),
(24,'Interview','Teaching Building X');


insert into Venue_Dist(Garage_id, Event_id, Venue_Dist, Fee) values 
(1,21,328,12),
(1,22,3830,8),
(1,23,1226,5),
(1,24,2200,10),
(2,21,3340,8),
(2,22,218,25),
(2,23,2295,10),
(2,24,1900,10),
(3,21,3906,5),
(3,22,420,20),
(3,23,2110,8),
(3,24,2755,8),
(4,21,928,15),
(4,22,2030,18),
(4,23,580,15),
(4,24,663,20),
(5,21,1228,15),
(5,22,1990,20),
(5,23,996,20),
(5,24,400,25);


insert into EVENT_DAYS(Event_id, Day) values 
(21,'2022-05-03'),
(21,'2022-05-04'),
(22,'2022-05-08'),
(22,'2022-05-13'),
(22,'2022-05-19'),
(22,'2022-05-21'),
(22,'2022-06-01'),
(22,'2022-06-12'),
(22,'2022-06-18'),
(22,'2022-06-24'),
(22,'2022-07-09'),
(22,'2022-07-15'),
(22,'2022-07-19'),
(22,'2022-07-28'),
(23,'2022-08-01'),
(23,'2022-08-02'),
(23,'2022-08-03'),
(23,'2022-08-04'),
(23,'2022-08-05'),
(24,'2022-05-31'),
(24,'2022-06-02'),
(24,'2022-06-03'),
(24,'2022-06-04');

insert into CUSTOMER(Customer_id, Name, Password, Login, Phone) values 
(99999999,'admin','passwdADMIN','usrADMIN','000-000-0000');