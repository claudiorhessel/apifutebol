<?php

namespace app\models;

require_once("../config/App.php");

use Create;
use Read;
use Update;
use app\core\Model;
use Helper;

class LeaguesModel extends Model
{
    protected $table = 'leagues';

    public $read;
    public $update;
    public $create;

    public function __construct()
    {
        parent::setTable($this->table);
        $this->read = new Read;
        $this->update = new Update;
        $this->create = new Create;
    }

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

        $this->read->FullRead("SELECT * FROM `leagues` " . $where, $parseString);
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getLeagueWithCoveragesAndFixturesById($id, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `leagues`.`deletedAt` IS NULL";
        }

        $this->read->FullRead("SELECT 
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
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getLeagueById($id, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        $this->read->FullRead("SELECT * FROM `leagues` WHERE `leagues`.`id` = :id " . $where , "id={$id}");
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getLeagueByReferalLeagueId($id, $showDeleted = false)
    {
        $where = NULL;
        if (!$showDeleted) {
            $where .= " AND `deletedAt` IS NULL";
        }

        $this->read->FullRead("SELECT * FROM `leagues` WHERE `leagues`.`referal_league_id` = :id " . $where , "id={$id}");
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function deleteLeagueById($id)
    {
        $data['deletedAt'] = date('Y-m-d H:i:s');
        $this->update->ExeUpdate('tabela', $data, "WHERE id = :id", 'id=' . $id);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }

    public function createLeague($data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $this->create->ExeCreate('leagues', $dataToSave);
        if ($this->create->getResult()) {
            $leagueId = $this->create->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateLeague($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        $this->update->ExeUpdate('leagues', $data, "WHERE id = :id", $parseString);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }
}