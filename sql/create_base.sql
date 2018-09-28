CONNECT TO phone;

DROP TABLE users;

CREATE TABLE DB2ADMIN.users
( id INTEGER NOT NULL,
name VARCHAR(40),
telephone VARCHAR(15));
                                                                    
insert into DB2ADMIN.users (id,name,telephone) values (1,'Mark','8-555-555-55-01');
insert into DB2ADMIN.users (id,name,telephone) values (2,'john','8-555-555-55-02');
insert into DB2ADMIN.users (id,name,telephone) values (3,'Riman','8-555-555-55-03');
insert into DB2ADMIN.users (id,name,telephone) values (4,'Kara','8-555-555-55-04');
insert into DB2ADMIN.users (id,name,telephone) values (5,'Magy','8-555-555-55-05');
insert into DB2ADMIN.users (id,name,telephone) values (6,'Mark','8-555-555-55-11');
insert into DB2ADMIN.users (id,name,telephone) values (7,'john','8-555-555-55-32');
insert into DB2ADMIN.users (id,name,telephone) values (8,'Riman','8-555-555-55-23');
insert into DB2ADMIN.users (id,name,telephone) values (9,'Kara','8-555-555-55-14');
insert into DB2ADMIN.users (id,name,telephone) values (10,'Marry','8-555-555-55-15');


COMMIT;