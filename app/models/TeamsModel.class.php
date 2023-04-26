<?php

namespace app\models;

require_once("../config/App.php");

use Create;
use Read;
use Update;
use app\core\Model;
use Helper;

class TeamsModel extends Model
{
    public $read;
    public $update;
    public $create;

    protected $table = 'teams';

    public function __construct()
    {
        parent::setTable($this->table);
        $this->read = new Read;
        $this->update = new Update;
        $this->create = new Create;
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

            if ($where == null) {
                $where = " WHERE `deletedAt` is null";
            } else {
                $where .= " AND `deletedAt` is null";
            }
        }

        $this->read->FullRead("SELECT * FROM `teams` " . $where, $parseString);
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getTeamById($id, $showDeleted = false) 
    {
        $parseString = null;
        $where = null;

        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        $this->read->FullRead("SELECT * FROM `teams` WHERE `id` = :id " . $where, "id={$id}" . $parseString);
        if ($this->read->getRowCount() < 1) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getTeamByLeagueId($leagueId, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        $this->read->FullRead("SELECT * FROM `teams` WHERE `league_id` = :league_id " . $where, "league_id={$leagueId}");
        if ($this->read->getRowCount() < 1) {
            return false;
        }

        $rows = $this->read->getResult();

        return $rows;
    }

    public function createTeam($data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $this->create->ExeCreate('teams', $dataToSave);
        if ($this->create->getResult()) {
            $leagueId = $this->create->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateTeam($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        $this->update->ExeUpdate('teams', $data, "WHERE id = :id", $parseString);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }
}