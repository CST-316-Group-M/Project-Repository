create database auth;

create user 'webauth'@'localhost' identified by 'webauth';

grant select on auth.* to 'webauth'@'localhost' identified by 'webauth';
 
grant insert on auth.* to 'new'@'localhost' identified by 'new';  

use auth;

create table users (first varchar(15), last varchar(20), password varchar(20), email varchar(30), primary key (email));

insert into users values('Lauren', 'Krugen', 'password', 'Lauren@gmail.com');

insert into users values('Jordan', 'Smith', 'password', 'Jordan@gmail.com');

insert into users values('Jason', 'Scribner', 'password', 'Jason@gmail.com');

insert into users values('Jacob', 'Reber', 'password', 'Jacob@gmail.com');

insert into users values('Chris', 'McDonalds', 'password', 'Chris@gmail.com');

insert into users values('Eyaad', 'Allam', 'password', 'Eyaad@gmail.com');
 
quit;