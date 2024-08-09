INSERT INTO `entity_type` (`id`, `name`, `luck_min`, `luck_max`) VALUES
                                                                 (1, 'courier', 15, 35),
                                                                 (2, 'package', 20, 35);


INSERT INTO `stats` (`id`, `name`) VALUES
                                       (1, 'stamina'),
                                       (2, 'speed'),
                                       (3, 'strenght'),
                                       (4, 'efficency'),
                                       (5, 'distance'),
                                       (6, 'weight'),
                                       (7, 'traffic'),
                                       (8, 'urgency');

INSERT INTO `skills` (`id`, `name`) VALUES
                                        (1, 'quick_route'),
                                        (2, 'heavy_lifting'),
                                        (3, 'impact');

INSERT INTO `stats_prop` (`id`, `id_stat`, `min`, `max`, `measurement`) VALUES
                                                                            (7, 7, 30, 60, '%'),
                                                                            (4, 4, 50, 70, 'efficency'),
                                                                            (6, 6, 10, 50, 'kg'),
                                                                            (5, 5, 5, 20, 'km'),
                                                                            (2, 2, 60, 90, 'km/h'),
                                                                            (8, 8, 1, 5, 'priority'),
                                                                            (1, 1, 80, 120, 'stamina'),
                                                                            (3, 3, 50, 70, 'strenght');

INSERT INTO `entity_type_stats` (`id`, `id_entity_type`, `id_stat`) VALUES
                                                                        (1, 1, 1),
                                                                        (2, 1, 2),
                                                                        (3, 1, 3),
                                                                        (4, 1, 4),
                                                                        (5, 2, 5),
                                                                        (6, 2, 6),
                                                                        (7, 2, 7),
                                                                        (8, 2, 8);

INSERT INTO `entity_type_skills` (`id`, `id_skill`, `id_entity_type`) VALUES
                                                                          (1, 1, 1),
                                                                          (2, 2, 1),
                                                                          (3, 3, 2);