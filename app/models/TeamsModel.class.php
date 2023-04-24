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

    public function getAllTeams($params = [])
    {
        $parseString = null;
        $where = null;

        if (count($params) > 0) {
            $data = Helper::dbPrepateData($params);
            $parseString = Helper::dbDataToParseString($data);
            $where = Helper::dbDataToWhereOR($data);
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

    public function getTeamById($id) 
    {
        READ->FullRead("SELECT * FROM `teams` WHERE `id` = :id" , "id={$id}");
        if (READ->getRowCount() < 1) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getTeamByLeagueId($leagueId)
    {
        READ->FullRead("SELECT * FROM `teams` WHERE `league_id` = :league_id", "league_id={$leagueId}");
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