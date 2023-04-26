<?php
namespace app\core;
require_once("../config/App.php");
use Create;
use Read;
use Update;

class Model
{
    protected $table = '';
    public $read;
    public $update;
    public $create;

    public function __construct()
    {
        $this->read = new Read;
        $this->update = new Update;
        $this->create = new Create;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function getAll($params = []) {
        $this->read->FullRead("SELECT * FROM " . $this->table);
        if ($this->read->getRowCount() < 1) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        $rows = $this->read->getResult();

        return $rows;
    }
}