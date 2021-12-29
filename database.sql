CREATE TABLE `users` (
'user_id' int(50),
'firstname' varchar(100) NOT NULL,
'lastname' varchar(100) NOT NULL,
`email` varchar(50) NOT NULL,
`password` varchar(255) NOT NULL,
PRIMARY KEY (user_id)
);

CREATE TABLE `details` (
'id' int(50),
'user_id'(11),
'Description' varchar(100) NOT NULL,
'Amount' bigint(100) NOT NULL,
`Type` varchar(100) NOT NULL,
`Date` date NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY user_id(users)
);
  