create table d_group(
    id           int auto_increment
        primary key,
    customer_id int,
    member_type nvarchar(255),
    status       nvarchar(255),
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);

create table d_credit(
    id           int auto_increment
        primary key,
    group_id int,
    cycle int,
    request_amount double,
    currency nvarchar(5),
    interest double,
    tenor int,
    repayment_type nvarchar(255),
    repayment_period nvarchar(255),
    dis_date datetime,
    first_repayment_date datetime,
    product_type nvarchar(255),
    purpose nvarchar(255),
    admin_fee double,
    other_fee double,
    code         nvarchar(255) not null,
    status       nvarchar(255),
    note         text                                 null,
    created_by   int                                  null,
    updated_by   int                                  null,
    date_created datetime default current_timestamp() null,
    date_updated datetime                             null
);