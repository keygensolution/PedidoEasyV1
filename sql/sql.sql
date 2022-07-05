create table t001_access_levels
(
    id         int         not null auto_increment primary key,
    level      varchar(50) not null,
    created_at timestamp   not null default current_timestamp,
    updated_at timestamp   null     default null on update current_timestamp
);

insert into t001_access_levels (level)
values ('Administrador Master'),
       ('Administrador'),
       ('Cliente'),
       ('Operador'),
       ('Cozinha'),
       ('Entregador'),
       ('Bar');

create table t002_users
(
    id              int          not null auto_increment primary key,
    name            varchar(100) not null,
    email           varchar(100) not null unique,
    password        varchar(150) not null,
    access_level_id int          not null,
    phone           char(11)     not null,
    birth_date      date         not null,
    cpf             char(11)     not null,
    foreign key (access_level_id) references t001_access_levels (id),
    created_at      timestamp    not null default current_timestamp,
    updated_at      timestamp    null     default null on update current_timestamp
);

insert into t002_users (name, email, password, access_level_id, phone, birth_date, cpf)
    value ('Lucas Francisco 2', 'lucasfrancisco21318@gmail.com',
           '$2y$10$lOeMPPHfLL.9uxJzdmV1C.1/Bv/FrxaEBixNcw.7.SSvV1AZVDf4O', 1, '61981287117', '1997-11-13',
           '07170232308');

create table t003_companies
(
    id           int          not null auto_increment primary key,
    company_name varchar(100) not null unique,
    cnpj         char(14)     not null,
    photo        varchar(50),
    zip_code     char(8)      not null,
    uf           char(2)      not null,
    city         varchar(50)  not null,
    district     varchar(100) not null,
    address      varchar(100) not null,
    number       int,
    complement   varchar(100),
    created_at   timestamp    not null default current_timestamp,
    updated_at   timestamp    null     default null on update current_timestamp
);

insert into t003_companies (company_name, cnpj, zip_code, uf, city, district, address, number)
    value ('Empresa teste', 12345678912345, 72300532, 'DF', 'Brasília', 'Samambaia Sul (Samambaia)',
           'Quadra 301 Conjunto 1', 301);

create table t004_ceo_and_companies
(
    id         int       not null auto_increment primary key,
    user_id    int       not null,
    company_id int       not null,
    foreign key (user_id) references t002_users (id),
    foreign key (company_id) references t003_companies (id),
    created_at timestamp not null default current_timestamp,
    updated_at timestamp null     default null on update current_timestamp
);

insert into t004_ceo_and_companies (user_id, company_id)
    value (2, 3);

create table t005_categories
(
    id            int          not null auto_increment primary key,
    category_name varchar(100) not null,
    description   varchar(255) not null,
    status        bool                  default 1,
    photo         varchar(100) not null,
    company_id    int,
    foreign key (company_id) references t003_companies (id),
    created_at    timestamp    not null default current_timestamp,
    updated_at    timestamp    null     default null on update current_timestamp
);

create view vw001_list_of_companies
as

select a.id
     , a.user_id
     , a.company_id
     , b.name
     , c.company_name
from t004_ceo_and_companies as a
         inner join t002_users as b
                    on a.user_id = b.id
         inner join t003_companies c
                    on a.company_id = c.id;


select * from t005_categories where company_id = 1 or company_id is null