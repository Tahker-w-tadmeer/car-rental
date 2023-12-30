SET FOREIGN_KEY_CHECKS = 0;
drop table if exists cities;
drop table if exists offices;
drop table if exists car_types;
drop table if exists brands;
drop table if exists cars;
drop table if exists models;
drop table if exists rentals;
drop table if exists users;
SET FOREIGN_KEY_CHECKS = 1;


CREATE TABLE IF NOT EXISTS `cities` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `country_code` varchar(2),

    UNIQUE INDEX `cities_name_country_code` (`country_code`, `name`)
);

CREATE TABLE IF NOT EXISTS `offices` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `city_id` int(11),
    `address` varchar(255),
    `phone` varchar(20),

    FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
);

CREATE TABLE IF NOT EXISTS `car_types` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `type_name` varchar(255)
);

CREATE TABLE IF NOT EXISTS `brands` (
   `id` int(11) PRIMARY KEY AUTO_INCREMENT,
   `name` varchar(255),

   UNIQUE INDEX `brand_name` (`name`)
);

CREATE TABLE IF NOT EXISTS `models` (
   `id` int(11) PRIMARY KEY AUTO_INCREMENT,
   `brand_id` int(11),
   `name` varchar(255),

   UNIQUE INDEX `model_brand_id_name` (`brand_id` ,`name`),
   FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
);

CREATE TABLE IF NOT EXISTS `cars` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `model_id` int(11),
    `year` int(2),
    `plate_id` varchar(20),
    `color` varchar(50),
    `office_id` int(11),
    `image` varchar(255) NULL,
    `mileage` int(11),
    `type_id` int(11),
    `category` enum('Gas', 'Electric', 'Hybrid'),
    `price_per_day` decimal(10, 2),

    FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
    FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
    FOREIGN KEY (`type_id`) REFERENCES `car_types` (`id`)
);

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `first_name` varchar(255),
    `last_name` varchar(255),
    `phone` varchar(20),
    `email` varchar(255) UNIQUE KEY,
    `password` varchar(255),
    `type` enum('Customer', 'Admin') default 'Customer'
);

CREATE TABLE IF NOT EXISTS `rentals` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `car_id` int(11),
    `user_id` int(11),
    `reserved_at` timestamp DEFAULT CURRENT_TIMESTAMP,
    `pickup_date` date,
    `picked_up_at` timestamp NULL,
    `return_date` date,
    `returned_at` timestamp NULL,
    `total_price` decimal(10,2),

    FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),

    INDEX `car_id_pickup_date` (`car_id`, `pickup_date`)
);
