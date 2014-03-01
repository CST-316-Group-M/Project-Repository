DB Creation for user registration:

All necessary commands will create and populate tables in a singular database through mysql.
The person logging in is a mysql 'webauth' user that only has permission to run select queries on the database
called 'auth'. User names and password are stored in auth's table called 'users' and if the password and name 
match, they are granted access to the next page. The current accounts held in the auth database are the names
of all of our group members - each with the same password which is 'password'.



