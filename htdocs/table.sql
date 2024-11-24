-- создаем таблицу users
create table users (
	id serial primary key,
	login varchar(20) not null unique,
	surname varchar(255) not null,
	pass numeric,
	name varchar(255) not null,
	email varchar(255) not null unique)

-- создание пользователя при регистрации 
insert into users(login,surname,name,pass,email) values (?,?,?,?,?)

--возвращение по...
select * from users where login = ?

select * from users where email = ?

--создаем таблицу groups
create table groups (
	id serial primary key,
    id_user integer references users(id),
	name varchar(255) not null)

-- создание групп 
insert into groups(name, id_user) values (?,?)

--возвращение по...
select id
from groups
where name=?

select id,name from groups where id_user=?

--изменить группу
update groups set name = ?
where id = ?

--создаем таблицу tasks
create table tasks (
	id serial primary key,
    id_user integer references users(id),
	id_group integer references groups(id),
	name varchar(255) not null,
	description varchar(10000),
	date_start date,
	date_finish date,
	status_id integer references nenujnia(id))

--создание задания
insert into tasks(id_user,id_group,name,description,date_start,date_finish,status_id) values (?,?,?,?,?,?,?)

--возвращение по...
select description from tasks where id_group = ?

--изменить статус
update tasks set status_id = ?
where id = ?

--изменить имя задания и задание
update tasks set name,description = ?,? where id = ?

--создаем таблицу nenujnia
create table nenujnia (
	id serial primary key,
	name varchar(255) not null)

--создание категории
insert into nenujnia(name) values(?)
