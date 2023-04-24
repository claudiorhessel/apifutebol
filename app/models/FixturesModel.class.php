<?php

namespace app\models;
use app\core\Model;
use Helper;

class FixturesModel extends Model
{
    public function getAllFixtures($params = [])
    {
        READ->FullRead("SELECT * FROM `fixtures`");
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
            WHERE `fixtures`.`id` = " . $id
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
        DB_CREATE_CLASS->ExeCreate('fixtures', $data);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateFixture($id, $data)
    {
        $parseString = Helper::dbDataToParseString($data, $id);
        DB_UPDATE_CLASS->ExeUpdate('fixtures', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}