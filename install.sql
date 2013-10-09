
CREATE TABLE `notenverwaltung` (
  `user_id` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  `seminar_id` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`user_id`,`seminar_id`)
);