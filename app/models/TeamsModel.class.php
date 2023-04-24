<?php

namespace app\models;
use app\core\Model;
use Helper;

class TeamsModel extends Model
{
    protected $table = 'teams';

    public function __construct()
    {
        parent::setTable($this->table);
    }

    public function getAllTeams($params = [], $showDeleted = false)
    {
        $parseString = null;
        $where = null;

        if (count($params) > 0) {
            $data = Helper::dbPrepateData($params);
            $parseString = Helper::dbDataToParseString($data);
            $where = Helper::dbDataToWhereOR($data);
        }

        if (!$showDeleted) {
            $parseString .= "&deletedAt=null";
            $where .= " AND `deletedAt` <=> :deletedAt";
            if (count($params) > 0) {
                $parseString = "";
                $where = " WHERE `deletedAt` is null";
            }
        }

        READ->FullRead("SELECT * FROM `teams` " . $where, $parseString);
        if (READ->getRowCount() < 1) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getTeamById($id, $showDeleted = false) 
    {
        $parseString = null;
        $where = null;

        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        READ->FullRead("SELECT * FROM `teams` WHERE `id` = :id " . $where, "id={$id}" . $parseString);
        if (READ->getRowCount() < 1) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getTeamByLeagueId($leagueId, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        READ->FullRead("SELECT * FROM `teams` WHERE `league_id` = :league_id " . $where, "league_id={$leagueId}");
        if (READ->getRowCount() < 1) {
            return false;
        }

        $rows = READ->getResult();

        return $rows;
    }

    public function createTeam($data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        DB_CREATE_CLASS->ExeCreate('teams', $dataToSave);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateTeam($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        DB_UPDATE_CLASS->ExeUpdate('teams', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}