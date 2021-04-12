-- prepare tables
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_at` datetime DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- seed data
INSERT INTO `php_test`.`products` (`id`,`name`, `description`, `photo`)
VALUES
(1, 'Product One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'one'),
(2, 'Prdkt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'two'),
(3, 'Product Number', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'three'),
(4, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'fourth_img'),
(5, 'Product Sixty nine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'fivefive'),
(6, 'Product Six', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'six'),
(7, 'Product Whatever', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'seven'),
(8, 'Product Whenever', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'eight'),
(9, 'Product Whoever', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas magna felis, porttitor...', 'nine');

INSERT INTO `php_test`.`comments` (`comment`,`created_at`,`approved_at`,`user_name`,`user_email`)
VALUES
('Lorem ipsum dolor sit amet,  adipiscing elit.', '2021-01-01 01:01:01', '2021-01-02 01:01:01', 'Alisher Mongershtern', 'test@test.com'),
('Lorem amet, consectetur adipiscing elit.', '2021-01-01 01:01:01', NULL, 'John Doe', 'test@test.com'),
('Lorem ipsum dolor sit amet,  adipiscing elit.', '2021-01-01 01:01:01', '2021-01-02 01:01:01', 'Jane Doe', 'test@test.com'),
('Lorem ipsum dolor sit amet, consectetur adipiscing.', '2021-01-01 01:01:01', NULL, 'Cris Cross', 'test@test.com'),
('Lorem ipsum dolor sit amet, consectetur adipiscing HAHAHAHA.', '2021-01-01 01:01:01', '2021-01-02 01:01:01', 'Gordon Ramsy', 'test@test.com');
