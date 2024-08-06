CREATE TABLE `productos` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `name` varchar(255) DEFAULT NULL,
    `price` decimal(10, 2) DEFAULT NULL,
    `stock` int(11) DEFAULT NULL,
    `status` char(3) DEFAULT 'ACT',
    `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
    `category_id` int(11) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`),
    KEY `fk_productos_categories` (`category_id`),
    CONSTRAINT `fk_productos_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci