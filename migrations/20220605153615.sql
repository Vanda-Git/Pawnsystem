alter table d_credit modify repayment_term varchar(255) null after customerId;

alter table d_credit modify id int auto_increment after repayment_term;

alter table d_credit modify dis_date date not null;

alter table d_credit modify first_repayment_date date not null;

alter table d_credit modify co_id varchar(25) null after id;