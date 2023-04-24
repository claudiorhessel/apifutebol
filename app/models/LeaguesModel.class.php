<?php

namespace app\models;
use app\core\Model;
use Helper;

class LeaguesModel extends Model
{
    protected $table = 'leagues';

    public function getAllLeagues($params = [])
    {
        READ->FullRead("SELECT * FROM `leagues`");
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getLeagueById($id)
    {
        READ->FullRead("SELECT 
                `leagues`.*,
                `leagues`.`id` as `league_id`,
                `coverages`.*,
                `coverages`.`id` as `coverage_id`,
                `coverages`.`standings` as `coverage_standings`,
                `fixtures`.*,
                `fixtures`.`id` as `fixture_id`
            FROM `leagues`
            LEFT JOIN `coverages` ON `leagues`.`id` = `coverages`.`league_id`
            LEFT JOIN `fixtures` ON `coverages`.`id` = `fixtures`.`coverage_id`
            WHERE `leagues`.`id` = " . $id
        );
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function deleteLeagueById($id)
    {
        $data['deletedAt'] = date('Y-m-d H:i:s');
        DB_UPDATE->ExeUpdate('tabela', $data, "WHERE id = :id", 'id=' . $id);
        if (DB_UPDATE->getResult()) {
            return true;
        }
        return false;
    }

    public function createLeague($data)
    {
        DB_CREATE_CLASS->ExeCreate('leagues', $data);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateLeague($id, $data)
    {
        $parseString = Helper::dbDataToParseString($data, $id);
        DB_UPDATE_CLASS->ExeUpdate('leagues', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}