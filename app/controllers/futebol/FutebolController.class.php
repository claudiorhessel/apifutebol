<?php
namespace app\controllers\futebol;

use app\core\Controller;
use app\models\CoveragesModel;
use app\models\FixturesModel;
use app\models\LeaguesModel;
use app\models\TeamsModel;
use Helper;

class FutebolController extends Controller {
    public function index()
    {
        $this->load('apifutebol/index');
    }
}

?>