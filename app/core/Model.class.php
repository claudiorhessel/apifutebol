<?php
namespace app\core;

class Model
{
    protected $table = '';
    public function __construct()
    {
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function getAll($params = []) {
        READ->FullRead("SELECT * FROM " . $this->table);
        if (READ->getRowCount() < 1) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        $rows = READ->getResult();

        return $rows;
    }
}