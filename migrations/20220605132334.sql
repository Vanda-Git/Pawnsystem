alter table d_credit add co_id varchar(25);

rename table d_group to d_group_detail;

create table d_group
(
	id int auto_increment,
	groupcd nvarchar(25) not null,
	created_date datetime default curdate() not null,
	created_by int null,
	updated_date date null,
	updated_by int null,
	constraint d_group_pk
		primary key (id)
);

create unique index d_group_groupcd_uindex
	on d_group (groupcd);

insert into d_master (code,name,caption)
values ('N','CRD_STATUS','Normal'),
       ('P','CRD_STATUS','Pending'),
       ('C','CRD_STATUS','Closed');