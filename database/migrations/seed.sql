insert into cities (`name`, `country_code`)
values ('Alexandria', 'EG'), ('Cairo', 'EG'), ('Marsa Matrooh', 'EG'), ('Asiut', 'EG'), ('Aswan', 'EG'),
       ('Luxor', 'EG'), ('Suez', 'EG'), ('Ismailia', 'EG'), ('Tanta', 'EG'),
       ('Damietta', 'EG'), ('Qena', 'EG'), ('Sohag', 'EG'), ('Hurghada', 'EG'), ('Minya', 'EG'),
       ('Beni Suef', 'EG'), ('Banha', 'EG'), ('Kafr El Sheikh', 'EG'),
       ('Arish', 'EG'), ('Mansoura', 'EG'), ('El Faiyum', 'EG'), ('Qalyub', 'EG'), ('Damanhur', 'EG'),
       ('Giza', 'EG'), ('Port Said', 'EG'), ('Siwa', 'EG'), ('New York', 'US'), ('London', 'UK'),
       ('Paris', 'FR'), ('Tokyo', 'JP'), ('Berlin', 'DE'), ('Sydney', 'AU'), ('Melbourne', 'AU'),
       ('Brisbane', 'AU'), ('Perth', 'AU'), ('Adelaide', 'AU'), ('Auckland', 'NZ'), ('Wellington', 'NZ'),
       ('Christchurch', 'NZ'), ('Dunedin', 'NZ'), ('Queenstown', 'NZ'), ('Hamilton', 'NZ'), ('Tauranga', 'NZ'),
       ('Napier', 'NZ'), ('Palmerston North', 'NZ'), ('Nelson', 'NZ'), ('Rotorua', 'NZ'), ('Whangarei', 'NZ'),
       ('Invercargill', 'NZ'), ('Hastings', 'NZ'), ('New Plymouth', 'NZ'), ('Whanganui', 'NZ'), ('Gisborne', 'NZ'),
       ('Doha', 'QA'), ('Dublin', 'IE'), ('Edinburgh', 'UK'), ('Manchester', 'UK'), ('Birmingham', 'UK'),
       ('Glasgow', 'UK'), ('Liverpool', 'UK'), ('Bristol', 'UK'), ('Sheffield', 'UK'), ('Leeds', 'UK'),
       ('Madrid', 'ES'), ('Rome', 'IT'), ('Moscow', 'RU'), ('Beijing', 'CN'), ('Seoul', 'KR'),
       ('Istanbul', 'TR'), ('Dubai', 'AE'), ('Bangkok', 'TH'), ('Singapore', 'SG'), ('Kuala Lumpur', 'MY'),
       ('Hong Kong', 'HK'), ('Barcelona', 'ES'), ('Amsterdam', 'NL'), ('Milan', 'IT'), ('Taipei', 'TW'),
       ('Vienna', 'AT'), ('Los Angeles', 'US'), ('Toronto', 'CA'), ('San Francisco', 'US'), ('Chicago', 'US'),
       ('Washington', 'US'), ('Boston', 'US'), ('Seattle', 'US'), ('Las Vegas', 'US'), ('Miami', 'US'),
       ('Atlanta', 'US'), ('Houston', 'US'), ('Dallas', 'US'), ('Philadelphia', 'US'), ('Phoenix', 'US'),
       ('San Diego', 'US'), ('Detroit', 'US'), ('Minneapolis', 'US'), ('Denver', 'US'), ('Portland', 'US'),
       ('Vancouver', 'CA'), ('Montreal', 'CA'), ('Calgary', 'CA'), ('Ottawa', 'CA'), ('Edmonton', 'CA'),
       ('Quebec City', 'CA'), ('Winnipeg', 'CA'), ('Halifax', 'CA'), ('Victoria', 'CA'), ('Regina', 'CA'),
       ('Saskatoon', 'CA'), ('St. John''s', 'CA'), ('Charlottetown', 'CA'), ('Yellowknife', 'CA'), ('Iqaluit', 'CA'),
       ('Whitehorse', 'CA'), ('Fredericton', 'CA'), ('Moncton', 'CA'), ('Saint John', 'CA'), ('Thunder Bay', 'CA'),
       ('Sudbury', 'CA'), ('Kingston', 'CA'), ('London', 'CA'), ('Windsor', 'CA'), ('Kitchener', 'CA'),
       ('Waterloo', 'CA'), ('Guelph', 'CA'), ('Barrie', 'CA'), ('Oshawa', 'CA'), ('Hamilton', 'CA');


insert into users (`first_name`, `last_name`, `email`, `phone`, `password`, `type`)
values ('Admin', '1', 'admin@car.test', '01234567891', '$2a$12$upq6InyBsHDUCjjNyPmy7ueSqtPznei.8e2tLqjx13AXSddbIABu2', 'Admin'); # password: 123456
