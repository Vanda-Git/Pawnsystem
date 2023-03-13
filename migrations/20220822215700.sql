delete from pawn_system_db.sub_menus where main_menu = '3';



INSERT INTO pawn_system_db.sub_menus (`rank`, main_menu, caption, url, icon, class, note, created_by, updated_by,
                                      date_created, date_updated)
VALUES (1, 3, 'Credit Schedule', '../Reports/ReportSchedule.php', '<i class="far fa-circle nav-icon"></i>', 'nav-item', '', 1, null,
        '2022-08-22 21:58:30', null);