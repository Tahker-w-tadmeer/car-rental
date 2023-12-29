insert into brands (`name`)
values ('Honda'), ('Toyota'), ('Ford'), ('Nissan'), ('BMW'),
       ('Mercedes'), ('Audi'), ('Tesla'), ('Chevrolet'),
       ('Volkswagen'), ('Kia'), ('Renault'), ('Jeep'), ('Geely'),
       ('Fiat'), ('Hyundai'), ('GM'), ('Peugeot');

insert into car_types (`id`, `name`)
values (1, 'Sedan'), (2, 'SUV'), (3, 'Hatchback'), (4, 'Convertible'), (5, 'Van'), (6, 'Truck'), (7, 'Other');

insert into models (brand_id, name) values
                                        (1, 'Accord'), (1, 'Civic'), (1, 'Fit'), (1, 'City'), (1, 'HR-V'),
                                        (1, 'Ridgeline'), (1, 'Insight'),
                                        (2, 'Corolla'), (2, 'Camry'), (2, 'RAV4'), (2, 'Highlander'), (2, 'Yaris'),
                                        (2, 'Prius'), (2, 'Sienna'), (2, 'Tacoma'),
                                        (3, 'Fiesta'),
                                        (3, 'F-150'), (3, 'Escape'), (3, 'Explorer'), (3, 'Mustang'),
                                        (4, 'Altima'), (4, 'Sentra'), (4, 'Maxima'), (4, 'Pathfinder'),
                                        (5, '3 Series'), (5, '5 Series'), (5, 'X3'), (5, 'X5'),
                                        (6, 'C-Class'), (6, 'E-Class'), (6, 'GLC'), (6, 'GLE'),
                                        (7, 'A3'), (7, 'A4'), (7, 'Q5'), (7, 'Q7'),
                                        (8, 'Model S'), (8, 'Model 3'), (8, 'Model X'), (8, 'Model Y'), (8, 'Cybertruck'),
                                        (9, 'Cruze'), (9, 'Malibu'), (9, 'Equinox'), (9, 'Traverse'),
                                        (10, 'Golf'), (10, 'Jetta'), (10, 'Passat'), (10, 'Tiguan'),
                                        (11, 'Sorento'), (11, 'Forte'), (11, 'Sportage'), (11, 'Telluride'),
                                        (12, 'Clio'), (12, 'Captur'), (12, 'Megane'), (12, 'Kadjar'),
                                        (13, 'Wrangler'), (13, 'Cherokee'), (13, 'Grand Cherokee'), (13, 'Renegade'),
                                        (14, 'Coolray'), (14, 'Azkarra'), (14, 'Emgrand X7 Sport'), (14, 'Okavango'),
                                        (15, '500'), (15, 'Panda'), (15, 'Tipo'), (15, '500X'),
                                        (16, 'Accent'), (16, 'Elantra'), (16, 'Tucson'), (16, 'Santa Fe'),
                                        (17, 'Camaro'), (17, 'Malibu'), (17, 'Silverado'), (17, 'Suburban'),
                                        (18, '208'), (18, '308'), (18, '3008'), (18, '5008');
