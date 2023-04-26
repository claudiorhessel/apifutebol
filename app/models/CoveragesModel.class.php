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

        $this->read->FullRead("SELECT * FROM `coverages` " . $where, $parseString);
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function getCoverageById($id)
    {
        $this->read->FullRead("SELECT * 
            FROM `coverages`
            WHERE `coverages`.`id` = :id" , "id={$id}"
        );
        if ($this->read->getRowCount() < 1) {
            return false;
        }
        $rows = $this->read->getResult();

        return $rows;
    }

    public function deleteCoverageById($id)
    {
        $data['deletedAt'] = date('Y-m-d H:i:s');
        $this->update->ExeUpdate('tabela', $data, "WHERE id = :id", 'id=' . $id);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }

    public function createCoverage($data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $this->create->ExeCreate('coverages', $dataToSave);
        if ($this->create->getResult()) {
            $leagueId = $this->create->getResult();
            return $leagueId;
        }
        return false;
    }

    public function updateCoverage($id, $data)
    {
        $dataToSave = Helper::dbPrepateData($data);
        $parseString = Helper::dbDataToParseString($dataToSave, $id);
        $this->update->ExeUpdate('coverages', $data, "WHERE id = :id", $parseString);
        if ($this->update->getResult()) {
            return true;
        }
        return false;
    }
}