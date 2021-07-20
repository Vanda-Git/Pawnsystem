truncate table pos_v1_db.sub_menus;
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (1, 1, 'Customer', '../Products/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (2, 2, 'Loan', '../Products1/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (3, 3, 'Report', '../Products2/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (4, 4, 'Position', '../Positions/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (5, 4, 'Permission', '../Permissions/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (6, 4, 'User', '../Users/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);
INSERT INTO pos_v1_db.sub_menus (id, main_menu, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (7, 4, 'Group', '../Groups/', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null, '2021-07-10 21:58:30', null);

truncate table pos_v1_db.main_menus;
INSERT INTO pos_v1_db.main_menus (id, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (1, 'Customer', '#', '<i class="nav-icon fas fa-database"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO pos_v1_db.main_menus (id, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (2, 'Loan', '#', '<i class="nav-icon fas fa-database"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO pos_v1_db.main_menus (id, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (3, 'Report', '#', '<i class="nav-icon fas fa-database"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);
INSERT INTO pos_v1_db.main_menus (id, caption, url, icon, class, note, created_by, updated_by, date_created, date_updated) VALUES (4, 'User Management', '#', '<i class="nav-icon fas fa-database"></i>', 'nav-item', '', 1, null, '2021-07-10 21:50:06', null);

truncate table pos_v1_db.permissions;
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (1, '1', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (2, '2', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (3, '3', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (4, '4', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (5, '5', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:28', null);
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (6, '6', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:29', null);
INSERT INTO pos_v1_db.permissions (id, sub_menu, p_group, views, adds, updates, deletes, note, created_by, updated_by, date_created, date_updated) VALUES (7, '7', 1, 1, 1, 1, 1, '', 1, null, '2021-07-10 21:52:29', null);

truncate table pos_v1_db.group_mapping;
insert into pos_v1_db.group_mapping(id, p_group, user, created_by, updated_by)
values(1,1,1,1,1);
insert into pos_v1_db.group_mapping(id, p_group, user, created_by, updated_by)
values(2,2,1,1,1);

SELECT
    t1.*
FROM permissions t1
inner join sub_menus t2 on t1.sub_menu = t2.id
inner join main_menus t3 on t2.main_menu = t3.id

select
    ROW_NUMBER() OVER (
        ORDER BY t1.id
    ) no,
    t1.id,
    t1.caption,
    t2.views,
    t2.adds,
    t2.updates,
    t2.deletes
from sub_menus t1
left join
    (
        select t1.sub_menu,
              t1.views,
               t1.adds,
               t1.updates,
               t1.deletes
        from permissions t1
        where t1.p_group = '1'
    ) t2 on t2.sub_menu = t1.id
inner join main_menus t3 on t3.id = t1.main_menu
where main_menu = '1'


select ROW_NUMBER() OVER ( ORDER BY t1.id ) no, t1.id, t1.caption, t2.views, t2.adds, t2.updates, t2.deletes from sub_menus t1 left join ( select t1.sub_menu, t1.views, t1.adds, t1.updates, t1.deletes from permissions t1 where t1.p_group = '1' ) t2 on t2.sub_menu = t1.id inner join main_menus t3 on t3.id = t1.main_menu where main_menu = '1'