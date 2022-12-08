CREATE TABLE Student (
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    fname varchar(50),
    surname varchar(100),
    PRIMARY KEY (id)
);

CREATE TABLE Teacher (
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    fname varchar(50),
    surname varchar(100),
    age int(3),
    subject_name int UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE class_name (
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    cname varchar(50),
    student_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (student_id) REFERENCES Student(id)
);

CREATE TABLE School_subject (
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    sname varchar(50),
    class_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES class_name(id)
);

CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    login varchar(50),
    pass varchar(255),
    PRIMARY KEY (id),
    taken Boolean,
    name VARCHAR(20),
    surname VARCHAR(20),
    age INTEGER
)
