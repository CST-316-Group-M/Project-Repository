CREATE DATABASE auth;

CREATE USER webauth@localhost IDENTIFIED BY 'webauth';

USE auth;

GRANT SELECT ON auth.* to webauth@localhost;

CREATE TABLE users(firstname varchar(20), password varchar(16), primary key (firstname));

INSERT INTO users(firstname, password) VALUES ('Lauren', 'password');

INSERT INTO users(firstname, password) VALUES ('Jordan', 'password');

INSERT INTO users(firstname, password) VALUES ('Jason', 'password');

INSERT INTO users(firstname, password) VALUES ('Jacob', 'password');

INSERT INTO users(firstname, password) VALUES ('Chris', 'password');

INSERT INTO users(firstname, password) VALUES ('Eyaad', 'password');

quit;