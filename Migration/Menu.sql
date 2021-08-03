truncate table sub_menus;
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (1,1, 1, 'Customer', '../Customers/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (2,1, 2, 'Loan', '../Loans/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (3,1, 3, 'Report', '../Reports/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (4,1, 4, 'Position', '../Positions/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (6,2, 4, 'User', '../Users/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (11,3, 4, 'Change Password', '../ChangePassword/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (5,1, 5, 'Permission', '../Permissions/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (7,2, 5, 'Group', '../Groups/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (8,3, 5, 'Group Mapping', '../GroupMapping/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (9,4, 5, 'Reset Password', '../ResetPassword/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (10,5, 5, 'System Parameter', '../SystemParameter/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (12,6, 5, 'LookUp Code', '../LookupCode/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO sub_menus (id,rank, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (13,1, 6, 'Collateral', '../Collaterals/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);

truncate table main_menus;
INSERT INTO main_menus (id,rank, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (1,1, 'Customer Management', '#', '<i class="nav-icon fas fa-users"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO main_menus (id,rank, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (2,3, 'Credit Management', '#', '<i class="nav-icon fas fa-file-invoice-dollar"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO main_menus (id,rank, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (3,5, 'Report Management', '#', '<i class="nav-icon fas fa-chart-pie"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO main_menus (id,rank, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (4,4, 'User Management', '#', '<i class="nav-icon fas fa-user"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO main_menus (id,rank, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (5,6, 'Administrator', '#', '<i class="nav-icon fas fa-users-cog"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO main_menus (id,rank, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (6,2, 'Collateral Management', '#', '<i class="nav-icon fas fa-id-card"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);











truncate table pawn_system_db.permissions;
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (1, '1', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (2, '2', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (3, '3', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (4, '4', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (5, '5', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (6, '6', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:29', null);
INSERT INTO pawn_system_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (7, '7', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:29', null);

truncate table pawn_system_db.group_mapping;
insert into pawn_system_db.group_mapping(id, p_group, user, created_by, updated_by)
values(1,1,1,1,1);
insert into pawn_system_db.group_mapping(id, p_group, user, created_by, updated_by)
values(2,2,1,1,1);

insert into pawn_system_db.parameters(name, value, note, created_by)
values('CompanyName','Pawn System','','1');
insert into pawn_system_db.parameters(name, value, note, created_by)
values('DefaultPassword','123','','1');

INSERT INTO pawn_system_db.positions (id, title, note, created_by, updated_by, date_created, date_updated) VALUES (1, 'Admin', 'N/A', 1, 1, '2021-07-10 21:37:49', null);
INSERT INTO pawn_system_db.positions (id, title, note, created_by, updated_by, date_created, date_updated) VALUES (2, 'Operation', 'N/A', 1, null, '2021-07-19 20:26:13', null);

INSERT INTO pawn_system_db.`groups` (id, title, note, created_by, updated_by, date_created, date_updated) VALUES (1, 'Admin', 'N/A', 1, 1, '2021-07-19 20:56:59', null);
INSERT INTO pawn_system_db.`groups` (id, title, note, created_by, updated_by, date_created, date_updated) VALUES (2, 'Operation', 'N/A', 1, null, '2021-07-19 21:16:54', null);
INSERT INTO pawn_system_db.`groups` (id, title, note, created_by, updated_by, date_created, date_updated) VALUES (3, 'Approval Group', '', 1, null, '2021-07-20 23:42:34', null);

INSERT INTO pawn_system_db.users (id, first_name, last_name, user, password, email, phone, status, image, position, note, created_by, updated_by, date_created, date_updated) VALUES (1, 'Vannyda', 'Bros', 'vanda', '1f32aa4c9a1d2ea010adcf2348166a04', 'vannyda.kh@gmail.com', 'phone', '1', 'blank.jpg', 1, '', 1, 1, '2021-07-10 21:39:58', null);
INSERT INTO pawn_system_db.users (id, first_name, last_name, user, password, email, phone, status, image, position, note, created_by, updated_by, date_created, date_updated) VALUES (2, 'Admin', 'Admin', 'admin', 'd9b1d7db4cd6e70935368a1efb10e377', 'admin@gmail.com', null, '1', null, 1, null, 1, 1, '2021-07-18 17:31:03', null);
INSERT INTO pawn_system_db.users (id, first_name, last_name, user, password, email, phone, status, image, position, note, created_by, updated_by, date_created, date_updated) VALUES (3, 'Jonh', 'Roby', 'jroby', 'd9b1d7db4cd6e70935368a1efb10e377', 'roby.jonh@gmail.com', null, '1', null, 1, null, 1, null, '2021-07-20 23:47:13', null);
INSERT INTO pawn_system_db.users (id, first_name, last_name, user, password, email, phone, status, image, position, note, created_by, updated_by, date_created, date_updated) VALUES (4, 'Dara', 'Kok', 'kdara', 'd9b1d7db4cd6e70935368a1efb10e377w', 'kdara@gmail.com', null, '1', null, 1, null, 1, null, '2021-07-20 23:50:42', null);
INSERT INTO pawn_system_db.users (id, first_name, last_name, user, password, email, phone, status, image, position, note, created_by, updated_by, date_created, date_updated) VALUES (7, '11', '11', '11', '123', 'roby.jonh@gmail.com', null, '0', null, 1, null, 1, null, '2021-07-21 20:10:16', null);

INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('NID','ID_TYPE','National ID','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('P','ID_TYPE','Passport','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('B','ID_TYPE','Birth Certificate','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('F','ID_TYPE','Family Book','','1','','1');

INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('SE','IS_OWNER','Self Employ','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('EM','IS_OWNER','Employee','','1','','1');

delete from d_master where name = 'TARGET';
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('PU','TARGET','Public','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('PR','TARGET','Private','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('OT','TARGET','Other','','1','','1');

delete from d_master where name = 'STATUS';
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('C','STATUS','Closed','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('N','STATUS','Normal','','1','','1');

delete from d_master where name = 'CO';
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('0001','CO','So Cheat','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('0002','CO','Chen Da','','1','','1');


delete from d_master where name = 'CO';
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('0001','CO','So Cheat','','1','','1');
INSERT INTO pawn_system_db.d_master(code, name, caption, remark, status, note, created_by)
VALUES('0002','CO','Chen Da','','1','','1');

SELECT
    SUM(t1.views) as views,
    SUM(t1.adds) as adds,
    SUM(t1.updates) as updates,
    SUM(t1.deletes) as deletes
FROM permissions t1
inner join sub_menus t2 on t1.sub_menu = t2.id
where t1.p_group in (1,2) and t2.url = '../LookupCode/'
#group by views,adds,updates,deletes

select
t1.id,
t1.caption,
t1.icon,
t1.url
from sub_menus t1
inner join permissions t2 on t1.id = t2.sub_menu and t2.views=1
where main_menu = '4' and t2.p_group in (1,2)
group by t1.id