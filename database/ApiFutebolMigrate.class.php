<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../config/config.php");
require_once("../config/App.php");
require_once("../app/services/rapidapi/api-football/v2/ApiFutebolService.class.php");
class ApiFutebolMigrate
{
    public function migrate()
    {
        $log = [];
        $log[] = "APIFUTEBOLSEEDER - " . date('Y-m-d H:i:s') . " - INICIO DO PROCESSO. <BR />";
        $dataToReturn = [];

        $queryExec = new Ddl;
        $query = "USE `" . DB_NAME . "`;
        SET FOREIGN_KEY_CHECKS = 0;
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
            `createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updatedAt` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
            `deletedAt` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            CONSTRAINT `UC_Referal_League` UNIQUE (`referal_league_id`),
              INDEX (`referal_league_id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        
        DROP TABLE IF EXISTS `coverages`;
        CREATE TABLE IF NOT EXISTS `coverages` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `league_id` bigint(20) NOT NULL,
            `standings` TINYINT(1) NULL DEFAULT NULL,
            `players` TINYINT(1) NULL DEFAULT NULL,
            `top_scorers` TINYINT(1) NULL DEFAULT NULL,
            `predictions` TINYINT(1) NULL DEFAULT NULL,
            `odds` TINYINT(1) NULL DEFAULT NULL,
            `createdAt` DATETIME DEFAULT NULL,
            `updatedAt` DATETIME DEFAULT NULL,
            `deletedAt` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
              KEY `fk_coverages_league_id_foreign` (`league_id`),
              CONSTRAINT `fk_coverages_league_id_foreign` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        
        DROP TABLE IF EXISTS `fixtures`;
        CREATE TABLE IF NOT EXISTS `fixtures` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `coverage_id` bigint(20) NOT NULL,
            `events` TINYINT(1) NULL DEFAULT NULL,
            `lineups` TINYINT(1) NULL DEFAULT NULL,
            `statistics` TINYINT(1) NULL DEFAULT NULL,
            `players_statistics` TINYINT(1) NULL DEFAULT NULL,
            `createdAt` DATETIME DEFAULT NULL,
            `updatedAt` DATETIME DEFAULT NULL,
            `deletedAt` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
              KEY `fk_fixtures_coverage_id_foreign` (`coverage_id`),
              CONSTRAINT `fk_fixtures_coverage_id_foreign` FOREIGN KEY (`coverage_id`) REFERENCES `coverages` (`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        
        DROP TABLE IF EXISTS `teams`;
        CREATE TABLE IF NOT EXISTS `teams` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `league_id` bigint(20) NOT NULL,
            `referal_league_id` bigint(20) NULL DEFAULT NULL,
            `referal_team_id` bigint(20) NULL DEFAULT NULL,
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
            PRIMARY KEY (`id`),
              INDEX (`referal_league_id`, `referal_team_id`),
              KEY `fk_teams_league_id_foreign` (`league_id`),
            CONSTRAINT `UC_Referal_Team` UNIQUE (`referal_league_id`, `referal_team_id`),
              CONSTRAINT `fk_teams_league_id_foreign` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SET FOREIGN_KEY_CHECKS = 1;
        ";

        $dataToReturn[] = $queryExec->ExeQuery($query);
        
        $log[] = "APIFUTEBOLSEEDER - " . date('Y-m-d H:i:s') . " - FIM DO PROCESSO. <BR />";

        $return['status'] = true;
        $return['message'] = "OK";
        $return['data'] = $dataToReturn;
        $return['log'] = $log;

        return $return;
    }

    private function saveLeague($league)
    {

    }

    private function saveCoverage($coverage)
    {
        
    }

    private function saveFixture($fixture)
    {
        
    }

    private function saveTeam($team)
    {
        
    }
}