CREATE TABLE `users`
(
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `age` TINYINT UNSIGNED DEFAULT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP DEFAULT NULL
);

CREATE TABLE `posts`
(
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `title` CHAR(255),
    `content` TEXT,
    `user_id` INT UNSIGNED,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP DEFAULT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);

CREATE TABLE `tags`
(
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `title` CHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP DEFAULT NULL
);

CREATE TABLE `posts_tags`
(
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `post_id` INT UNSIGNED,
    `tag_id` INT UNSIGNED,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`),
    FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`)
);

INSERT INTO `users` (`name`, `email`, `password`) VALUES ('Sergosdfsdcsdc', 'infsdcsdcdsfvco@com', '123456');

SELECT `name`, `email` FROM `users`;

SELECT * FROM `users` WHERE `email` = 'info@com';
SELECT * FROM `users` WHERE `email` LIKE '%com';
SELECT * FROM `users` WHERE `deleted_at` IS NOT NULL;
SELECT * FROM `users` WHERE `deleted_at` IS NULL;
SELECT * FROM `users` WHERE `id` IN(1, 2);
SELECT * FROM `users` WHERE `id` NOT IN(1, 2);
SELECT * FROM `users` LIMIT 1, 3;
SELECT * FROM `users` ORDER BY `id` ASC;
SELECT * FROM `users` ORDER BY `id` DESC

# UPDATE
# DELETE FROM `users` WHERE