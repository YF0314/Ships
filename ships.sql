-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql713.db.sakura.ne.jp
-- 生成日時: 2019 年 8 月 19 日 21:34
-- サーバのバージョン： 5.7.21-log
-- PHP のバージョン: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `marubouzukun_ships`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `body`
--

CREATE TABLE `body` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `body`
--

INSERT INTO `body` (`id`, `body`, `signature`) VALUES
(1, '{\"previous\":\"fcbcf165908dd18a9e49f7ff27810176db8e9f63b4352213741664245224f8aa\",\"unix\":1566217931,\"pdf\":\"f0cd87a9d6e39e72d72ae810ae68d26dc2eb30a88c6506d4e9fbf4bfb394fe7f\",\"user\":\"8\"}', 'n8F9zb5eKaEUmndyy1O7RFJyU86OYLuBq4DL+Ikr4R6IeOQ7HG0HSdbjys9DjbmtcFlKqrU91c/IMtbjScc2urJ4HYIlef+NxoqE1ZYmzST4fY45k1oTovt+oNR9fjzKybC8fzkT+C+SxRTUG534SQSMDt8cdFglH4GDbtAq0rKuYW393LRS3pFQ4SvGvCCAoyBn4dIzaznCpsYJ4f8Gtq3iKtPSH4bOf/GGEfB63OESE1bV7eKfA5E310gFADRPDWAsbmyHspC/mof9lX2t9a1ZiDC0x37FwCoiOHn/xqf/8s5JACakymIi8vvDBNPkI2ovG3pnIewU6W6xMOZnqnnA7Dx6aSTeSlGi1jRV6Jw49D4YU82/GXIT1CLzIse8qHeI/PMLWHb4kZ1XYyXCrPkUI9IugiA6zfLRdp0KPnObumXESAshP/p8PsuJcPuzS+WHXic7IWJ24Tp5jNCQB1UVGYcts84GTUCXGKdoAAGL2c6KGT0LGKA7VuqUZZOgPuUmjD6aP8mUgOm1wtcMbQiQPHxvzxozX3w/GMxQtt+FN0sgt2G62ZfA3jxTmPD4DEptuFKoecepd99WznxlpHF9ndBltUcl2m4OXAUbecYgb7En+twSkKAry6Hf0gXu093D8B5KpL4m2Q3uajZswO0Duxw93yEPyBT4Zny4sKI='),
(2, '{\"previous\":\"c460149f2b2a6cedb64830e20e66be009d9c22dd00817988aaf390ebafacaf6b\",\"unix\":1566217946,\"pdf\":\"f0cd87a9d6e39e72d72ae810ae68d26dc2eb30a88c6506d4e9fbf4bfb394fe7f\",\"user\":\"8\"}', 'exTJp/OfYe5w+eqXCYEhVwTuzgK/yMlMkQynjdwD7H7niXTon1kNCEpp8LLZ4DH26X0TOQjKZzGzN0nVKpADoIP+ilS5jnU8CA/aEGupfIdnQ7MEIzgBz58T9P7R+jmAL2or02d2Y9Ttg9lz37Vu/EzC8RpeTn4M9N5dpaNNCU/mYKVPd3S1ggFHGJyjHWOrWV7yFHH6dES0tCjoY7RIcS+yehS6M/yLOEK2RKHvgSCBNdQ2YuVVgOvFIcbyx831GATZH2u8MoPmzi3q9IeWKKb7q3vvJfDh4UzlWHg/hoc1OwY31/+HbMBnVFCnv4/yx9E7X4b9fk7AwaC8lV4k0DIjBLX9mORuInmhsW8OE0TvPhQSImeMn2UVb+evS3n9x8BqWjC2QFPt16B7T64imQ7PymPI959nmMBv+GnAP3fM+gUYomUQSdJ+OiLvNko13d9slh8fjzVxXcwpF1pq/nsbf2QIyfY2RooWRAxKe9D80Xswg+i/v7quV5JcGbsCcbCJYkJ69ZTDkpp5DTaAFZ3BnbBdDS0Ue1wNmroGADMSLKNw2xYuksntTLYg7v/I2/VlFQ9sbXudLnhhcKtXjAAR6v/fNPsA1sBvD1a5P/yBQOq+GLZnNS2ts4+LDI+3cPUy4bIQqcfmONzHtA+ndxKYI/OLeut6FnyDDq9ecxQ='),
(3, '{\"previous\":\"f6c5ace5ee45896e8aa0ab9600a366021548c181a2424eda559b3274ee056b52\",\"unix\":1566218072,\"pdf\":\"0380cd157ae1d1b033dc165b688b2026ead679d5507438c55f9fd568f2c8661f\",\"user\":\"8\"}', 'qGyTANM8R+DY6GtQaxoKFF16ZwqpxvIggFZqxTyUnQ0PosbId+OeehclAiOvEYk0cAsfE3ywsPB8S5k/IklvixUi7tZEcBeZLj9g2lp33OL6pP/RJxP6KUKaSpzQ7fGVGfdzwmIDJ+k0pqN4eFsywdp2BpJIsUYCxo4dwi4h9rNUfe7v20RcAXsApA7jgMRdrBzIPMtSK7ilGQEyYR+UBYyGa0BL1lxNgZGYrOQFlsyj7Wr8kxA+nXdHjZ09/V7tecJr1wO5NtBuXzpI52sRT5xQNaorUVvCl+4kmjlA4iJluByPMNgZvQVfack6sVfCwcAyCKAIjorByvGn75VEpp7tv/LUik34v9ogd0n3iap5UmJotx/hsuuCrp3t0KAwWjpfH/gqPTIITViPyJfj2ufOzZfSoQX4zBe1O+YOf3TSKtjoyy3j4ikRbGFc+5NV1XlAwIRfQaZ8xwnO82LI/595mrB8XuCBLexbuU2goM26vWFfyeJgZ9ZJFmePYUQJfoIrFGixFjIncIqMcpMRLLCP4Y4zLlmgyMGUmIQ8Tu/UENK/z4E+NxIWTqAb0GPDbVSe4TAu2K577OMvGxIi+LlOEGq/14aKU1S0bSWZYjgoV27MHDR/XGOQjbKscG3L9odb0bDh+VkPy9uE5FMwQC3HDxKmwV+ucFTwO/ORN14=');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `private_key` text NOT NULL,
  `public_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users` Bhe3spyのPandoraのテストアカウントです。
--

INSERT INTO `users` (`id`, `user_id`, `private_key`, `public_key`) VALUES
(1, 8, '-----BEGIN PRIVATE KEY-----\n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\nvoa9ItMp71O1x6PGZjd/h5OjDdOi\n-----END PRIVATE KEY-----\n', '-----BEGIN PUBLIC KEY-----\nMIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAxO8TU8S0xyMfYQLt7USH\n/JWGAQlsaA4zGUqHUaLGjW5HFJ27Zzd1GYe8Tt64V5Zrgyi+T07VGdM/XVp9WQVW\nGcVfHbKUZDDk3l12YgvqhqwTLkCd7oHzk2KC1k4X1es1MjGTEFxpybTRzSEI6cab\ns0c6whkhT2DDaQzwoCfqxuKlTxGNZ6bQGih3rdS+L7IsTfoza9gAEd6hXji50xzJ\n0atEjc4/SLnSWz5nIxUjkGS4Z/f/3t+vr1R62QMobwV6ynWCp8yWaDnL28A/O0Ce\nKc80Q4HWTwVjFnPpLmN8SR9M9qZtoVhzNtEJywFyjI96ox7dul7/rEgVimvZaDD3\nkia5pACBUpJ8NFRHw2RC2h74IDpATWIWEU5aizxSXmoSdNJqaBuhS3YWUc8V4Bzw\nkdEAICzjSnhNd7lA/u8YEPkmm+UgFZFc0wU9MuctQXPuW0HJwZB8WSRaTiy4wHNy\nAC/AADe4rb58zeHgo21ulZdD6bnE1FbN8J3HtJphKWKwwzDrdOSTgzdYcq2c4/+S\nKtR983qTnG9z0KwKcc0LlpxH3WpNyHfS+1WYnVF/4Hv1b0ooY2ZPcp8nm3I7W6Dp\n5u0UAN0TIDcJOj0xSDkiECCv7MaahRQvKui9U2T9Nd3LBN9n7XDe02fBzJ4mIpv2\nk5BjPJbrza68+J6aTAklVvsCAwEAAQ==\n-----END PUBLIC KEY-----\n');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `body`
--
ALTER TABLE `body`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `body`
--
ALTER TABLE `body`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;