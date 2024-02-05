create database company;


use company;
create table employee(
	employee_id int primary key,
    first_name varchar(50),
	last_name varchar(50),
    email varchar(50) unique,
	salary decimal(10,3)
);

insert into employee(employee_id, first_name, last_name, email, salary) values
(00, 'furkan', 'xon', 'furkan@gmail.com', 0),
(01,'ali', 'xon', 'ali@gmail.com', 0),
(02,'atakan', 'xon', 'atakan@gmail.com', 0),
(03,'bedirhan', 'xon', 'bedirhan@gmail.com', 0),
(04,'cengiz', 'xon', 'cengiz@gmail.com', 0);

select first_name, last_name from employee;

insert into employee(employee_id, first_name, last_name, email, salary) values (5,'ahmet', 'yılmaz', 'sample@email.com',60000);

update employee set salary=0 where email = 'sample@email.com';

delete from employee where email='sample@email.com';

alter table employee add index index_email(email);
SHOW INDEX FROM employee;

create table department(department_id int primary key, department_name varchar(50));


-- alter table employee add constraint fk_department_id foreign key (employee_id) references department (department_id);


start transaction;
update employee set salary=50000 where employee_id = 4;

commit;
-- rollback;
select salary FROM `company`.`employee`;

/*
Concurrency, veri tabanı yönetim sisteminin uyumlu bir şekilde çalışması için gerekli bir kavramdır. Birden fazla kişi aynı veri üzerinde işlem yapmak istediğinde bu verilerin tutarlı olması gerekmektedir.
Isolation ise her bir işlemin birbirinden bağımsız çalışmasıdır. Bu iki kavarmın önemini şu şekilde görebiliriz: rezervasyon işlemi sırasında bir odanın birden fazla kişiye aynı anda rezerve edilmesinin önüne geçer. 
*/


