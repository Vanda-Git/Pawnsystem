drop table d_customer;
create table d_customer
(
    id             int auto_increment primary key,
    code           varchar(255) unique                       not null,
    first_name_en  varchar(255)                              null,
    middle_name_en varchar(255)                              null,
    last_name_en   varchar(255)                              null,
    first_name_kh  varchar(255)                              null,
    last_name_kh   varchar(255)                              null,
    gender         varchar(10)                               null,
    dob            date                                      null,
    phone          varchar(50)                               null,
    email          varchar(50)                               null,
    id1_type       varchar(5)                                null,
    id1_number     varchar(50)                               null,
    id1_expire     date                                      null,
    id1_issue      date                                      null,
    id1_place      varchar(50)                               null,
    id1_document   varchar(50)                               null,
    id2_type       varchar(5)                                null,
    id2_number     varchar(50)                               null,
    id2_expire     date                                      null,
    id2_issue      date                                      null,
    id2_place      varchar(50)                               null,
    id2_document   varchar(50)                               null,
    id3_type       varchar(5)                                null,
    id3_number     varchar(50)                               null,
    id3_expire     date                                      null,
    id3_issue      date                                      null,
    id3_place      varchar(50)                               null,
    id3_document   varchar(50)                               null,
    address_line1  varchar(255)                              null,
    address_line2  varchar(255)                              null,
    country        varchar(10)                               null,
    province       varchar(10)                               null,
    district       varchar(10)                               null,
    commune        varchar(10)                               null,
    village        varchar(10)                               null,
    is_owner       varchar(10)                               null,
    target         varchar(10)                               null,
    occupation     varchar(255)                              null,
    company_name   nvarchar(255)                             null,
    total_income   float                                     null,
    currency       varchar(10)                               null,
    co_id          varchar(10)                               null,
    remark         varchar(1000)                             null,
    status         varchar(1000) default 'N'                 null,
    created_by     int                                       null,
    updated_by     int                                       null,
    date_created   datetime      default current_timestamp() null,
    date_updated   datetime                                  null
);

create table group_mapping
(
    id           int auto_increment
        primary key,
    p_group      int                                  not null,
    user         int                                  not null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

create table `groups`
(
    id           int auto_increment
        primary key,
    title        varchar(255)                         null,
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

drop table main_menus;
create table main_menus
(
    id           int auto_increment
        primary key,
    rank         int                                  null,
    caption      varchar(255)                         null,
    url          varchar(255)                         null,
    icon         varchar(255)                         null,
    class        varchar(255)                         null,
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

create table parameters
(
    id           int auto_increment
        primary key,
    name         varchar(255)                         null,
    value        varchar(255)                         null,
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

create table permissions
(
    id           int auto_increment
        primary key,
    sub_menu     varchar(255)                         null,
    p_group      int                                  not null,
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

create table positions
(
    id           int auto_increment
        primary key,
    title        varchar(255)                         null,
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

create table products
(
    id           int auto_increment
        primary key,
    code         varchar(10)                          not null,
    name         varchar(255)                         null,
    brand        int                                  null,
    catagory     int                                  null,
    price        double                               null,
    note         text                                 null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

drop table sub_menus;
create table sub_menus
(
    id           int auto_increment
        primary key,
    rank         int                                  null,
    main_menu    int                                  null,
    caption      varchar(255)                         null,
    url          varchar(255)                         null,
    icon         varchar(255)                         null,
    class        varchar(255)                         null,
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);


create table users
(
    id           int auto_increment
        primary key,
    first_name   varchar(255)                             null,
    last_name    varchar(255)                             null,
    user         varchar(255)                             not null,
    password     varchar(255) default '123'               not null,
    email        varchar(255)                             null,
    phone        varchar(255)                             null,
    status       varchar(255) default '1'                 null,
    image        varchar(255)                             null,
    position     int                                      null,
    note         text                                     null,
    created_by   int                                      null,
    updated_by   int                                      null,
    date_created datetime     default current_timestamp() null,
    date_updated datetime                                 null,
    constraint users_user_uindex
        unique (user)
);

create table d_master
(
    id           int auto_increment
        primary key,
    code         nvarchar(255),
    name         nvarchar(255),
    caption      nvarchar(255),
    remark       nvarchar(255),
    status       nvarchar(255),
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

drop table d_collaterals;
create table d_collaterals
(
    id           int auto_increment
        primary key,
    code         nvarchar(255),
    title_type   nvarchar(255),
    customer_id  int                                  not null,
    owner_name   nvarchar(255)                        null,
    number       nvarchar(255)                        null,
    issue_date   nvarchar(255)                        null,
    issue_place  nvarchar(255)                        null,
    value        float                                not null,
    document    text null,
    location     nvarchar(255)                        null,
    status       nvarchar(255),
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

create table migrations
(
    id       int auto_increment primary key,
    filename text                                 not null,
    status   int                                  not null,
    date     datetime default current_timestamp() not null
);