create database tutorials;

create table if not exists images(
id int auto_increment primary key,
name varchar(100) not null,
image longblob not null
);