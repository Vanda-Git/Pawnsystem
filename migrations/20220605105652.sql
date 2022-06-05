alter table d_credit add ctmType varchar(25);
insert into d_master (code,name,caption)
values ('S','CTM_TYPE','Single'),
       ('J','CTM_TYPE','Joint');