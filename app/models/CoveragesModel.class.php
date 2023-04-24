<?php

namespace app\models;
use app\core\Model;
use Helper;

class CoveragesModel extends Model
{
    public function getAllCoverages($params = [])
    {
        $parseString = null;
        $where = null;

        if (count($params) > 0) {
            $data = Helper::dbPrepateData($params);
            $parseString = Helper::dbDataToParseString($data);
            $where = Helper::dbDataToWhereOR($data);
        }

        READ->FullRead("SELECT * FROM `coverages` " . $where, $parseString);
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
            WHERE `coverages`.`id` = :id" , "id={$id}"
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
        $dataToSave = Helper::dbPrepateData($data);
        DB_CREATE_CLASS->ExeCreate('coverages', $dataToSave);
        if (DB_CREATE_CLASS->getResult()) {
            $leagueId = DB_CREATE_CLASS->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateCoverage($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        DB_UPDATE_CLASS->ExeUpdate('coverages', $data, "WHERE id = :id", $parseString);
        if (DB_UPDATE_CLASS->getResult()) {
            return true;
        }
        return false;
    }
}