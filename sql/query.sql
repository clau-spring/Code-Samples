CREATE DATABASE secure_login;
CREATE TABLE user_login (
    id int(6) auto_increment primary key,
    username varchar(50) not null,
    email varchar(30) not null,
    password varchar(50) not null
);