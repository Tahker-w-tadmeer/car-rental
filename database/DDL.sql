CREATE TABLE IF NOT EXISTS `brand` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),

    UNIQUE INDEX `brand_name` (`name`)
);

CREATE TABLE IF NOT EXISTS `model` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `brand_id` int(11),
    `name` varchar(255),

    UNIQUE INDEX `model_name_year` (`name`),
    FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
);

CREATE TABLE IF NOT EXISTS `city` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `country_code` varchar(2),

    UNIQUE INDEX `city_name_country_code` (`country_code`, `name`)
);

CREATE TABLE IF NOT EXISTS `office` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `city_id` int(11),
    `address` varchar(255),
    `phone` varchar(20),

    FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
);

CREATE TABLE IF NOT EXISTS `car_type` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255)
);

CREATE TABLE IF NOT EXISTS `car` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `model_id` int(11),
    `year` int(2),
    `type_id` int(11),
    `plate_id` varchar(20),
    `color` varchar(50),
    `office_id` int(11),
    `image` varchar(255),
    `mileage` int(11),
    `status` enum('Active', 'Out of Service', 'Rented'),
    `category` enum('Gas', 'Electric', 'Hybrid'),
    `price_per_day` decimal(10, 2),

    FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
    FOREIGN KEY (`office_id`) REFERENCES `office` (`id`),
    FOREIGN KEY (`type_id`) REFERENCES `car_type` (`id`)
);

CREATE TABLE IF NOT EXISTS `customer` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `first_name` varchar(255),
    `last_name` varchar(255),
    `phone` varchar(20),
    `email` varchar(255) UNIQUE KEY,
    `password` varchar(255)
);

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255),
    `email` varchar(255) UNIQUE KEY,
    `password` varchar(255)
);

CREATE TABLE IF NOT EXISTS `rental` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `car_id` int(11),
    `customer_id` int(11),
    `reserved_at` timestamp DEFAULT CURRENT_TIMESTAMP,
    `pickup_date` date,
    `picked_up_at` timestamp NULL,
    `return_date` date,
    `returned_at` timestamp NULL,
    `total_price` decimal(10,2),

    FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),

    INDEX `car_id_pickup_date` (`car_id`, `pickup_date`)
);