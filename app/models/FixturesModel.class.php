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

        READ->FullRead("SELECT * FROM `fixtures` " . $where, $parseString);
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getFixtureById($id)
    {
        READ->FullRead("SELECT * 
            FROM `fixtures`
            WHERE `fixtures`.`id` = :id" , "id={$id}"
        );
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function deleteFixtureById($id)
    {
        $data['deletedAt'] = date('Y-m-d H:i:s');
        DB_UPDATE->ExeUpdate('tabela', $data, "WHERE id = :id", 'id=' . $id);
        if (DB_UPDATE->getResult()) {
            return true;
        }
        return false;
    }

    public function createFixture($data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        DB_CREATE_CLASS->ExeCreate('fixtures', $dataToSave);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateFixture($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        DB_UPDATE_CLASS->ExeUpdate('fixtures', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}