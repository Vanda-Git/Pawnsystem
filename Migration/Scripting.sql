
use pawn_system_db;

select
    t1.code,
    concat(t1.first_name_en,' ',t1.last_name_en) as fullname_en,
    concat(t1.first_name_kh,' ',t1.last_name_kh) as fullname_kh,
    t1.id,
    t1.dob,
    t1.date_created,
    t1.co_id
from d_customer t1;

SELECT
                code,
                name,
                caption
            FROM d_master
            where name='DISTRICT' AND code like '01%'
            order by code asc

INSERT INTO d_customer ( code, first_name_en, last_name_en, first_name_kh, last_name_kh, gender, dob, phone, email, id1_type, id1_number, id1_document, id1_issue, id1_expire, country, province, district, commune, village, address_line1, address_line2, is_owner, target, occupation, company_name, total_income, currency, created_by )
VALUES ( '1', 'Bros', 'Vannyda', 'ប្រុស', 'វណ្ណនីដា', 'Male', '2021-07-28', '0987654321', 'vannyda.kh@gmail.com', 'B', '098765432', '', '2021-07-28', '2021-07-19', 'KH', '01', '0102', '010201', '01020101', '', '', 'EM', 'PU', '', '', '700', 'USD', '1' )