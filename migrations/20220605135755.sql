alter table d_group
	add status nvarchar(10) default 'N' null;


alter table d_group_detail
	add groupId int not null after id;