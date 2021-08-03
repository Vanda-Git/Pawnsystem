create table migrations
(
    id       int auto_increment
        primary key,
    filename text                                 not null,
    status   int                                  not null,
    date     datetime default current_timestamp() not null
);
create table test (id int, name nvarchar(255));