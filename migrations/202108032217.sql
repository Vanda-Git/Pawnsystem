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