drop table pos_v1_db.group_mapping;
create table pos_v1_db.group_mapping(
    id           int auto_increment
        primary key,
    p_group        int                                  not null,
    user        int not null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

# '--drop table pos_v1_db.permissions;
create table pos_v1_db.permissions
(
    id           int auto_increment
        primary key,
    sub_menu     varchar(255)                         null,
    p_group        int                                  not null,
    views        int                                  null,
    adds         int                                  null,
    updates      int                                  null,
    deletes      int                                  null,
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);