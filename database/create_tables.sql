uSE `futebol`;
DROP TABLE IF EXISTS `fixtures`;
CREATE TABLE IF NOT EXISTS `fixtures` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`events` TINYINT(1) NULL DEFAULT NULL,
	`lineups` TINYINT(1) NULL DEFAULT NULL,
	`statistics` TINYINT(1) NULL DEFAULT NULL,
	`players_statistics` TINYINT(1) NULL DEFAULT NULL,
	`createdAt` DATETIME DEFAULT NULL,
	`updatedAt` DATETIME DEFAULT NULL,
	`deletedAt` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `coverages`;
CREATE TABLE IF NOT EXISTS `coverages` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`standings` TINYINT(1) NULL DEFAULT NULL,
	`fixture_id` bigint(20) NULL DEFAULT NULL,
	`players` TINYINT(1) NULL DEFAULT NULL,
	`top_scorers` TINYINT(1) NULL DEFAULT NULL,
	`predictions` TINYINT(1) NULL DEFAULT NULL,
	`odds` TINYINT(1) NULL DEFAULT NULL,
	`createdAt` DATETIME DEFAULT NULL,
	`updatedAt` DATETIME DEFAULT NULL,
	`deletedAt` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`),
  	KEY `fk_coverages_fixture_id_foreign` (`fixture_id`),
  	CONSTRAINT `fk_coverages_fixture_id_foreign` FOREIGN KEY (`fixture_id`) REFERENCES `fixtures` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS leagues;
CREATE TABLE IF NOT EXISTS `leagues` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT ,
	`referal_league_id` bigint(20) NULL DEFAULT NULL,
	`name` VARCHAR(255) NULL DEFAULT NULL,
	`type` VARCHAR(50) NULL DEFAULT NULL,
	`country` VARCHAR(100) NULL DEFAULT NULL,
	`country_code` VARCHAR(2) NULL DEFAULT NULL,
	`season` bigint(4) NULL DEFAULT NULL,
	`season_start` DATE NULL DEFAULT NULL,
	`season_end` DATE NULL DEFAULT NULL,
	`logo` VARCHAR(255) NULL DEFAULT NULL,
	`flag` VARCHAR(255) NULL DEFAULT NULL,
	`standings` TINYINT(1) NULL DEFAULT NULL,
	`is_current` TINYINT(1) NULL DEFAULT NULL,
  	`coverage_id` bigint(20) NULL DEFAULT NULL,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updatedAt` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
	`deletedAt` DATETIME DEFAULT NULL,
	CONSTRAINT `UC_Referal_League` UNIQUE (`referal_league_id`),
	PRIMARY KEY (`id`),
  	KEY `leagues_coverage_id_foreign` (`coverage_id`),
  	CONSTRAINT `leagues_coverage_id_foreign` FOREIGN KEY (`coverage_id`) REFERENCES `coverages` (`id`),
  	INDEX (`referal_league_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`referal_league_id` bigint(20) NOT NULL,
	`referal_team_id` bigint(20) NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`code` VARCHAR(255) NULL DEFAULT NULL,
	`logo` VARCHAR(255) NULL DEFAULT NULL,
	`country` VARCHAR(100) NOT NULL,
	`is_national` TINYINT(1) NULL DEFAULT NULL,
	`founded` bigint(20) NULL DEFAULT NULL,
	`venue_name` VARCHAR(255) NULL DEFAULT NULL,
	`venue_surface` VARCHAR(255) NULL DEFAULT NULL,
	`venue_address` VARCHAR(255) NULL DEFAULT NULL,
	`venue_city` VARCHAR(255) NULL DEFAULT NULL,
	`venue_capacity` bigint(20) NULL DEFAULT NULL,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updatedAt` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
	`deletedAt` DATETIME DEFAULT NULL,
	CONSTRAINT `UC_Referal_Team` UNIQUE (`referal_league_id`, `referal_team_id`),
	PRIMARY KEY (`id`),
  	INDEX (`referal_league_id`, `referal_team_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `league_teams`;
CREATE TABLE IF NOT EXISTS `league_teams` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`league_id` bigint(20) NOT NULL,
	`team_id` bigint(20) NOT NULL,
	PRIMARY KEY (`id`),
  	KEY `fk_league_teams_league_id_foreign` (`league_id`),
  	KEY `fk_league_teams_team_id_foreign` (`team_id`),
  	CONSTRAINT `fk_league_teams_league_id_foreign` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`),
  	CONSTRAINT `fk_league_teams_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;