--
-- Database Derole 0.0.1
--

-- --------------------------------------------------------

-- таблица персонажа
CREATE TABLE IF NOT EXISTS `users` (
  `id_user`  BIGINT(20) unsigned NOT NULL AUTO_INCREMENT, -- уникальный номер, который не повторяеться и с каждым новым пользователем увеличиваеться на 1
  `email`  CHAR(64), -- текстовый тип (64 символа)
  `pass`  CHAR(32), -- текстовый тип (32 символа)
  `name`  CHAR(32), -- текстовый тип (32 символа)
  `life`  INT DEFAULT 50, -- числовой тип, по умолчанию равен 50
  `atk`  INT DEFAULT 7, -- числовой тип, по умолчанию равен
  `def`  INT DEFAULT 5, -- числовой тип, по умолчанию равен
  `lov`  INT DEFAULT 7, -- числовой тип, по умолчанию равен
  `lvl`  INT DEFAULT 1, -- числовой тип, по умолчанию равен
  `exp`  INT DEFAULT 0, -- числовой тип, по умолчанию равен
  PRIMARY KEY (`id_user`)  -- Показываем что уникальным номером у нас являеться id_user
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- таблица аватара
CREATE TABLE IF NOT EXISTS `avatar` (
  `id_ava`  INT(20) unsigned NOT NULL AUTO_INCREMENT, -- уникальный номер, который не повторяеться и с каждым новым пользователем увеличиваеться на 1
  `gander`  SMALLINT(1), -- Пол игрока, цыфровой тип(1 цыфра)
  `vid`  SMALLINT(2), -- Вид игрока,  цыфровой тип(2 цыфры)
  `path`  CHAR(32), -- Путь к папке с рисунками персонажа, текстовый тип(32 символа)
  PRIMARY KEY (`id_ava`) -- Показываем что уникальным номером у нас являеться id_ava
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- таблица чата
CREATE TABLE IF NOT EXISTS `chat` (
  `id_msg`  bigint(20) unsigned NOT NULL AUTO_INCREMENT, -- уникальный номер, который не повторяеться и с каждым новым пользователем увеличиваеться на 1
  `msg`  CHAR(255), -- текстовый тип(255 символов)
  `time_msg`  CHAR(5), -- текстовый тип(5 символов)
  `wrt_user`  CHAR(32), -- текстовый тип(32 символов
  `who`  CHAR(32), -- текстовый тип(32 символов)
  PRIMARY KEY (`id_msg`) -- Показываем что уникальным номером у нас являеться id_msg
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- таблица инвентаря */
CREATE TABLE IF NOT EXISTS `inventar` (
  `id_inv`  bigint(20) unsigned NOT NULL AUTO_INCREMENT, -- уникальный номер, который не повторяеться и с каждым новым пользователем увеличиваеться на 1
  `name_object`  CHAR(64),
  `atk_up`  INT(2),
  `def_up`  INT(2),
  `lov_up`  INT(2),
  `life_up`  INT(4),
  PRIMARY KEY (`id_inv`) -- Показываем что уникальным номером у нас являеться id_msg
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- таблица квеста */
CREATE TABLE IF NOT EXISTS `quest` (
  `id_quest`  bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cont_quest`  CHAR(32),
  `kill_quest`  INT DEFAULT 0,
  PRIMARY KEY (`id_quest`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- таблица боя
CREATE TABLE IF NOT EXISTS `battle` (
  `id_btl`  bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `end_btl`  CHAR(32),
  PRIMARY KEY (`id_btl`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
CREATE TABLE IF NOT EXISTS `enemy` (
  `id_enm`  bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_enm`  CHAR(32),
  `atk_enm`  INT,
  `life_enm`  INT,
  `def_enm`  INT,
  `lov_enm`  INT,
  `exp_enm`  INT,
  `path_enm`  CHAR(32),
  PRIMARY KEY (`id_enm`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- Добавляем в таблицу данные о враге
INSERT INTO `enemy` (name_enm,atk_enm,life_enm,def_enm,lov_enm,exp_enm,path_enm) VALUES
('Призраки','7','40','6','4','10','path/enemy/');
