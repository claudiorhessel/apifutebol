<?php

namespace app\models;
use app\core\Model;
use Helper;

class CoveragesModel extends Model
{
    public function getAllCoverages($params = [])
    {
        READ->FullRead("SELECT * FROM `coverages`");
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function getCoverageById($id)
    {
        READ->FullRead("SELECT * 
            FROM `coverages`
            WHERE `coverages`.`id` = " . $id
        );
        if (READ->getRowCount() < 1) {
            return false;
        }
        $rows = READ->getResult();

        return $rows;
    }

    public function deleteCoverageById($id)
    {
        $data['deletedAt'] = date('Y-m-d H:i:s');
        DB_UPDATE->ExeUpdate('tabela', $data, "WHERE id = :id", 'id=' . $id);
        if (DB_UPDATE->getResult()) {
            return true;
        }
        return false;
    }

    public function createCoverage($data)
    {
        DB_CREATE_CLASS->ExeCreate('coverages', $data);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateCoverage($id, $data)
    {
        $parseString = Helper::dbDataToParseString($data, $id);
        DB_UPDATE_CLASS->ExeUpdate('coverages', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}