SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `php_articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `php_articles` (`id`, `user_id`, `category`, `content`, `image`, `created_at`) VALUES
(26, 6, 'ika', 'Dessa morötter är jättefärska!', 'uploads/articles/chrome_ZM6mI8slPq.png', '2025-03-26 18:26:26'),
(27, 3, 'coop', 'den här vattemelonen är dålig kvalite', 'uploads/articles/1002000M.jpg', '2025-03-26 20:22:43'),
(28, 7, 'ika', 'Denna vattenmelon var verkligen under all kritik. Köttet var mjukt och smaklöst. Köp inte!', 'uploads/articles/IMG_8393.jpg', '2025-03-26 20:28:17'),
(29, 8, 'lidl', 'Ekologiska gurkorna var krispiga och färska. Perfekt till sallader! Rekommenderas varmt.', 'uploads/articles/GardenCukes-56a5b0b63df78cf772896f61.jpg', '2025-03-26 20:30:27'),
(30, 9, 'hemkop', 'Kycklingen var inte fräsch. Luktade konstigt redan vid öppning. Mycket besviken!', 'uploads/articles/gecug8tryt8b1.jpg', '2025-03-26 20:33:12'),
(31, 10, 'supergrossen', 'Äpplena var perfekt mogna och söta. Utmärkt kvalitet för priset. 5 stjärnor!', 'uploads/articles/Jazz-apple-1024x713.jpg', '2025-03-26 20:35:06'),
(32, 11, 'willys', 'Färska jordgubbar men alldeles för sura. Inte värt pengarna den här gången.', 'uploads/articles/skogens-jordgubbar-ask-m-hand-IMG_9853-stor.jpg', '2025-03-26 20:38:54'),
(33, 12, 'coop', 'Avokadon var perfekt mogen och krämig. Gjorde underbar guacamole. Köper igen!', 'uploads/articles/guacamole-m-koriander-IMG_1499-800x500.jpg', '2025-03-26 20:41:13'),
(34, 13, 'ika', 'Tonfisken i burk var torr och smaklös. Väntade mig mycket bättre kvalité.', 'uploads/articles/1gcxpzkdpgy71.jpg', '2025-03-26 20:44:29');

CREATE TABLE `php_users` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `php_users` (`id`, `uniqueid`, `first_name`, `last_name`, `email`, `password`, `role`, `avatar`) VALUES
(3, '1209570043', 'Chiril', 'Bogza', 'sobacika1999@gmail.com', '$2y$10$JM3Iyq4ARYKd4CZhZOX9Te.HROU66WhL6z8CjecmCz5xbHSoavqeO', 'Developer', 'uploads/3_—Pngtree—eat food micro fat girl_4699781.png'),
(6, '244905224', 'Bayard', 'Léane', 'BayardLeane@gmail.com', '$2y$10$D79qgnQqF2pp20KS1v27A.USDcAfuUjBFND1Y1tufYlP1vQ/S5j7i', 'user', 'uploads/6_—Pngtree—pink donut cartoon illustration_4675799.png'),
(7, '1982199705', 'Lukas', 'Bergström', 'lukasbergstrom@gmail.com', '$2y$10$O7UtIgORJs3Zkptm9X267.D67IYRIJXdQ37zty8kgmHeL0bpnRdMS', 'user', 'uploads/7_pexels-simon-robben-55958-614810.jpg'),
(8, '1119064621', 'Elena ', 'Kowalski', 'elenakowalski@gmail.com', '$2y$10$SzotxC2xSosgJ7sDgMJsQuUdQ.XR6TALeOj4bo01n2cW8sk7r5ljC', 'user', 'uploads/8_pexels-olly-733872.jpg'),
(9, '544640456', 'Oliver', 'Dubois', 'oliverdubois@gmail.com', '$2y$10$XX73Lo2Q47ocVK.OlDgsROrK2xd6bCPJy6CXX5zUNlfhOc8Ik2vVy', 'user', 'uploads/9_pexels-jeffreyreed-769772.jpg'),
(10, '1595906960', 'Sophia', 'Müller', 'sophiamuller@gmail.com', '$2y$10$punFjrOtIWAuJmu0el8IDOy86Ye2h0KpAzvlRPmKdDMTJ4Z0y7tDe', 'user', 'uploads/10_pexels-enginakyurt-1642161.jpg'),
(11, '53929463', 'Mateo', 'Ricci', 'mateoricci@gmail.com', '$2y$10$1kBmIZzZdjABOSdL7xzYteUgAJir4j.zTct0Xoa7fa6MIAZ4O9xC6', 'user', 'uploads/11_pexels-botanicalnature-5397723.jpg'),
(12, '907296974', 'Nora', 'Jensen', 'norajensen@gmail.com', '$2y$10$t9SYz4fPsqqUsFDelYAjiudgkDYw.qCsga.9ZSWJ1hBpkALwmi96a', 'user', 'uploads/12_pexels-sam-lion-6001480.jpg'),
(13, '948677524', 'Ivan', 'Petrov', 'ivanpetrov@gmail.com', '$2y$10$9NPROogtyBHNOowz3L84BO96Tzebl.w8t60LU0g/0jlXPZX/UIekq', 'user', 'uploads/13_pexels-maksgelatin-5506141.jpg');

ALTER TABLE `php_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `php_users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `php_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `php_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `php_articles`
  ADD CONSTRAINT `php_articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `php_users` (`id`);
COMMIT;
