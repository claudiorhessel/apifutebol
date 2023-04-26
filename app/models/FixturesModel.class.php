<?php

namespace app\models;
use app\core\Model;
use Helper;

class FixturesModel extends Model
{
    public function getAllFixtures($params = [])
    {
        $parseString = null;
        $where = null;

        if (count($params) > 0) {
            $data = Helper::dbPrepateData($params);
            $parseString = Helper::dbDataToParseString($data);
            $where = Helper::dbDataToWhereOR($data);
        }

        $this->read->FullRead("SELECT * FROM `fixtures` " . $where, $parseString);
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getFixtureById($id)
    {
        $this->read->FullRead("SELECT * 
            FROM `fixtures`
            WHERE `fixtures`.`id` = :id" , "id={$id}"
        );
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function deleteFixtureById($id)
    {
        $data['deletedAt'] = date('Y-m-d H:i:s');
        $this->update->ExeUpdate('tabela', $data, "WHERE id = :id", 'id=' . $id);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }

    public function createFixture($data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $this->create->ExeCreate('fixtures', $dataToSave);
        if ($this->create->getResult()) {
            $leagueId = $this->create->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateFixture($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        $this->update->ExeUpdate('fixtures', $data, "WHERE id = :id", $parseString);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }
}