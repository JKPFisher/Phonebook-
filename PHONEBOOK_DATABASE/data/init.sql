CREATE DATABASE phonebook; 

use phonebook; 


CREATE TABLE contacts ( 
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL, 
    lastname VARCHAR(30) NOT NULL, 
	address VARCHAR(100) NOT NULL, 
	mobilenumber  VARCHAR(12) NOT NULL, 
    homenumber VARCHAR(15) NOT NULL,  
    date TIMESTAMP 

);
