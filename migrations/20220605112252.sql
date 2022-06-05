alter table d_credit change repayment_period repayment_term varchar(255) null;
alter table d_credit change group_id customerId varchar(255) null;

insert into d_master (code,name,caption)
values ('PL','PRODUCT_TYPE','Personal loan'),
       ('HL','PRODUCT_TYPE','Housing loan'),
       ('AL','PRODUCT_TYPE','Auto loan'),
       ('CL','PRODUCT_TYPE','Consumer loan');