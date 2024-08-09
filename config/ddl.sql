CREATE TABLE `entity_type` (
                               `id` int(11) PRIMARY KEY NOT NULL,
                               `name` varchar(255) NOT NULL,
                               `luck_min` int(11) NOT NULL,
                               `luck_max` int(11) NOT NULL
);

CREATE TABLE `entity_type_skills` (
                                      `id` int(11) PRIMARY KEY NOT NULL,
                                      `id_skill` int(11) NOT NULL,
                                      `id_entity_type` int(11) NOT NULL
);

CREATE TABLE `entity_type_stats` (
                                     `id` int(11) PRIMARY KEY NOT NULL,
                                     `id_entity_type` int(11) NOT NULL,
                                     `id_stat` int(11) NOT NULL
);

CREATE TABLE `skills` (
                          `id` int(11) PRIMARY KEY NOT NULL,
                          `name` varchar(255) NOT NULL
);

CREATE TABLE `stats` (
                         `id` int(11) PRIMARY KEY NOT NULL,
                         `name` varchar(255) NOT NULL
);

CREATE TABLE `stats_prop` (
                              `id` int(11) PRIMARY KEY NOT NULL,
                              `id_stat` int(11) NOT NULL,
                              `min` int(11) NOT NULL,
                              `max` int(11) NOT NULL,
                              `measurement` varchar(255) NOT NULL
);

ALTER TABLE `entity_type_skills` ADD CONSTRAINT `entity_type_skills_FK_1` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id`);

ALTER TABLE `entity_type_skills` ADD CONSTRAINT `entity_type_skills_FK_2` FOREIGN KEY (`id_entity_type`) REFERENCES `entity_type` (`id`);

ALTER TABLE `entity_type_stats` ADD CONSTRAINT `entity_type_stats_FK_1` FOREIGN KEY (`id_stat`) REFERENCES `stats` (`id`);

ALTER TABLE `entity_type_stats` ADD CONSTRAINT `entity_type_stats_FK_2` FOREIGN KEY (`id_entity_type`) REFERENCES `entity_type` (`id`);

ALTER TABLE `stats_prop` ADD CONSTRAINT `stats_prop_FK_1` FOREIGN KEY (`id_stat`) REFERENCES `stats` (`id`);