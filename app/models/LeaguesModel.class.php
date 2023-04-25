<?php

namespace app\models;
use app\core\Model;
use Helper;

class LeaguesModel extends Model
{
    protected $table = 'leagues';

    public function getAllLeagues($params = [], $showDeleted = false)
    {
        $parseString = null;
        $where = null;

        if (count($params) > 0) {
            $data = Helper::dbPrepateData($params);
            $parseString = Helper::dbDataToParseString($data);
            $where = Helper::dbDataToWhereOR($data);
        }

        if (!$showDeleted) {
            if ($where == null) {
                $where = " WHERE `deletedAt` is null";
            } else {
                $where .= " AND `deletedAt` is null";
            }
        }

        READ->FullRead("SELECT * FROM `leagues` " . $where, $parseString);
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getLeagueWithCoveragesAndFixturesById($id, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `leagues`.`deletedAt` IS NULL";
        }

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
            WHERE `leagues`.`id` = :id" , "id={$id} . $where"
        );
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getLeagueById($id, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        READ->FullRead("SELECT * FROM `leagues` WHERE `leagues`.`id` = :id " . $where , "id={$id}");
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getLeagueByReferalLeagueId($id, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        READ->FullRead("SELECT * FROM `leagues` WHERE `leagues`.`referal_league_id` = :id " . $where , "id={$id}");
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
        $dataToSave = Helper::dbPrepateData($data);
        DB_CREATE_CLASS->ExeCreate('leagues', $dataToSave);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateLeague($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        DB_UPDATE_CLASS->ExeUpdate('leagues', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}