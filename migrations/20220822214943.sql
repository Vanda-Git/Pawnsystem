create table d_crd_schedule
(
    id         int auto_increment
        primary key,
    credit_id  int    null,
    due_number int    null,
    due_date   date   null,
    payment    double null,
    principle  double null,
    interest   double null,
    balance    double null,
    created_by int,
    created_date date default current_date(),
    constraint d_crd_schedule_credit_id_due_number_uindex
        unique (credit_id, due_number)
);
