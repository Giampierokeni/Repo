CREATE TABLE `categories` (
    `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `category_name` varchar(128) NOT NULL COMMENT 'Category Name',
    `category_small_desc` varchar(255) DEFAULT NULL,
    `category_status` char(3) DEFAULT 'ACT' COMMENT 'Status',
    `create_time` datetime DEFAULT current_timestamp() COMMENT 'Create Time',
    `update_time` datetime DEFAULT current_timestamp() COMMENT 'Update Time',
    PRIMARY KEY (`category_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Table for Categories'


INSERT INTO `categories` (`category_id`, `category_name`, `category_small_desc`, `category_status`, `create_time`, `update_time`) VALUES
(1, 'Leche', 'Lacteos procesados de Leche', 'ACT', '2024-03-04 23:23:16', '2024-03-04 23:23:16'),
(2, 'Carnes', 'Carnes procesadas', 'ACT', '2024-03-04 23:23:16', '2024-03-04 23:23:16'),
(3, 'Frutas', 'Frutas procesadas', 'ACT', '2024-03-04 23:23:16', '2024-03-04 23:23:16');