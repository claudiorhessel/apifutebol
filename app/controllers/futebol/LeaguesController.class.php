<?php
namespace app\controllers\futebol;

use app\core\Controller;
use app\models\CoveragesModel;
use app\models\FixturesModel;
use app\models\LeaguesModel;
use app\models\TeamsModel;
use app\validations\LeagueValidations;
use Helper;

class LeaguesController extends Controller {
    public function listLeagues()
    {
        $params = [
            "referal_league_id" => isset($_GET["referal_league_id"])? $_GET["referal_league_id"] : null,
            "name" => isset($_GET["name"])? $_GET["name"] : null,
            "season" => isset($_GET["season"])? $_GET["season"] : null,
            "season_start" => isset($_GET["season_start"])? $_GET["season_start"] : null,
            "season_end" => isset($_GET["season_end"])? $_GET["season_end"] : null
        ];

        $leaguesModel = new LeaguesModel;
        $data = $leaguesModel->getAllLeagues($params);

        $status = false;
        $message = "Error";

        if ($data) {
            $status = true;
            $message = "OK";
        }

        $this->load('apifutebol/leagues_list', [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'search' => $params
        ]);
    }

    public function leagueDetail($id)
    {
        $leaguesModel = new LeaguesModel;
        $data = $leaguesModel->getLeagueWithCoveragesAndFixturesById($id);

        if (!$data) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }
        
        $teamsModel = new TeamsModel;
        $returnData = $data[0];
        $returnData["teams"] = $teamsModel->getTeamByLeagueId($id);

        $this->load('apifutebol/league_detail', [
            'status' => true,
            'message' => "OK",
            'data' => $returnData,
        ]);
    }

    public function leagueDelete($id)
    {
        $leaguesModel = new LeaguesModel;

        $dataLeague = [
            "deletedAt" => date("Y-m-d H:i:s")
        ];

        $leagueUpdated = $leaguesModel->updateLeague($id, $dataLeague);

        Helper::redirect('/leagues_list');
    }

    public function leagueAdd()
    {
        $this->load('apifutebol/league_add', [
            'status' => true,
            'message' => "OK",
            'data' => $_POST
        ]);
    }

    public function leagueSave()
    {
        $ids = [];
        $validations = [];
        $status = false;
        $message = "Erro ao criar liga.";
        $leaguesModel = new LeaguesModel;
        $coveragesModel = new CoveragesModel;
        $fixturesModel = new FixturesModel;

        $dataLeague = [
            "referal_league_id" => isset($_POST["referal_league_id"])? $_POST["referal_league_id"] : null,
            "name" => isset($_POST["name"])? $_POST["name"] : null,
            "type" => isset($_POST["type"])? $_POST["type"] : null,
            "country" => isset($_POST["country"])? $_POST["country"] : null,
            "country_code" => isset($_POST["country_code"])? $_POST["country_code"] : null,
            "season" => isset($_POST["season"])? $_POST["season"] : null,
            "season_start" => isset($_POST["season_start"])? $_POST["season_start"] : null,
            "season_end" => isset($_POST["season_end"])? $_POST["season_end"] : null,
            "logo" => isset($_POST["logo"])? $_POST["logo"] : null,
            "flag" => isset($_POST["flag"])? $_POST["flag"] : null,
            "standings" => isset($_POST["standings"])? $_POST["standings"] : null,
            "is_current" => isset($_POST["is_current"])? $_POST["is_current"] : null
        ];

        $leagueValidations = new LeagueValidations;
        $validations = $leagueValidations->validateInsert($dataLeague);

        if ($validations) {
            $this->load('apifutebol/league_add', [
                'status' => false,
                'message' => 'Erro ao validar os dados',
                'data' => $_POST,
                'ids' => $ids,
                'validations' => $validations
            ]);

            exit();
        }

        $leagueCreated = $leaguesModel->createLeague($dataLeague);

        if ($leagueCreated) {
            $dataCoverage = [
                "league_id" => $leagueCreated,
                "standings" => isset($_POST["coverage_standings"])? $_POST["coverage_standings"] : null,
                "players" => isset($_POST["players"])? $_POST["players"] : null,
                "top_scorers" => isset($_POST["top_scorers"])? $_POST["top_scorers"] : null,
                "predictions" => isset($_POST["predictions"])? $_POST["predictions"] : null,
                "odds" => isset($_POST["odds"])? $_POST["odds"] : null
            ];

            $coverageCreated = $coveragesModel->createCoverage($dataCoverage);

            if ($coverageCreated) {
                $dataFixture = [
                    "coverage_id" => $coverageCreated,
                    "events" => isset($_POST["events"])? $_POST["events"] : null,
                    "lineups" => isset($_POST["lineups"])? $_POST["lineups"] : null,
                    "statistics" => isset($_POST["statistics"])? $_POST["statistics"] : null,
                    "players_statistics" => isset($_POST["players_statistics"])? $_POST["players_statistics"] : null
                ];

                $fixtureCreated = $fixturesModel->createFixture($dataFixture);

                if ($fixtureCreated) {
                    $ids = [
                        "league_id" => $leagueCreated,
                        "coverage_id" => $coverageCreated,
                        "fixture_id" => $fixtureCreated
                    ];

                    $status = true;
                    $message = "Liga criada com sucesso.";
                    
                    Helper::redirect('/leagues_list');
                }
            }
        }

        $this->load('apifutebol/league_add', [
            'status' => $status,
            'message' => $message,
            'data' => $_POST,
            'ids' => $ids
        ]);
    }

    public function leagueUpdate($id)
    {
        $status = false;
        $message = "Erro ao atualizar liga.";
        $leagueId = $id;
        $ids = [];
        $leaguesModel = new LeaguesModel;
        $coveragesModel = new CoveragesModel;
        $fixturesModel = new FixturesModel;
        $teamsModel = new TeamsModel;

        $dataLeague = [
            "referal_league_id" => isset($_POST["referal_league_id"])? $_POST["referal_league_id"] : null,
            "name" => isset($_POST["name"])? $_POST["name"] : null,
            "type" => isset($_POST["type"])? $_POST["type"] : null,
            "country" => isset($_POST["country"])? $_POST["country"] : null,
            "country_code" => isset($_POST["country_code"])? $_POST["country_code"] : null,
            "season" => isset($_POST["season"])? $_POST["season"] : null,
            "season_start" => isset($_POST["season_start"])? $_POST["season_start"] : null,
            "season_end" => isset($_POST["season_end"])? $_POST["season_end"] : null,
            "logo" => isset($_POST["logo"])? $_POST["logo"] : null,
            "flag" => isset($_POST["flag"])? $_POST["flag"] : null,
            "standings" => isset($_POST["standings"])? $_POST["standings"] : null,
            "is_current" => isset($_POST["is_current"])? $_POST["is_current"] : null
        ];

        $leagueValidations = new LeagueValidations;
        $validations = $leagueValidations->validateUpdate($dataLeague, $id);

        if ($validations) {
            $this->load('apifutebol/league_add', [
                'status' => false,
                'message' => 'Erro ao validar os dados',
                'data' => $_POST,
                'ids' => $ids,
                'validations' => $validations
            ]);

            exit();
        }

        $leagueUpdated = $leaguesModel->updateLeague($leagueId, $dataLeague);

        if ($leagueUpdated) {
            $coverageId = $_POST["coverage_id"];
            $dataCoverage = [
                "league_id" => isset($_POST["league_id"])? $_POST["league_id"] : null,
                "standings" => isset($_POST["coverage_standings"])? $_POST["coverage_standings"] : null,
                "players" => isset($_POST["players"])? $_POST["players"] : null,
                "top_scorers" => isset($_POST["top_scorers"])? $_POST["top_scorers"] : null,
                "predictions" => isset($_POST["predictions"])? $_POST["predictions"] : null,
                "odds" => isset($_POST["odds"])? $_POST["odds"] : null
            ];

            $coverageUpdated = $coveragesModel->updateCoverage($coverageId, $dataCoverage);

            if ($coverageUpdated) {
                $fixtureId = $_POST["fixture_id"];

                $dataFixture = [
                    "coverage_id" => isset($_POST["coverage_id"])? $_POST["coverage_id"] : null,
                    "events" => isset($_POST["events"])? $_POST["events"] : null,
                    "lineups" => isset($_POST["lineups"])? $_POST["lineups"] : null,
                    "statistics" => isset($_POST["statistics"])? $_POST["statistics"] : null,
                    "players_statistics" => isset($_POST["players_statistics"])? $_POST["players_statistics"] : null
                ];

                $fixtureUpdated = $fixturesModel->updateFixture($fixtureId, $dataFixture);

                if ($fixtureUpdated) {
                    $ids = [
                        "league_id" => $leagueId,
                        "coverage_id" => $coverageId,
                        "fixture_id" => $fixtureId
                    ];

                    $status = true;
                    $message = "Liga criada com sucesso.";
                    Helper::redirect('/leagues_list');
                }
            }
        }

        $returnData = $_POST;
        $returnData["teams"] = $teamsModel->getTeamByLeagueId($leagueId);
        $this->load('apifutebol/league_detail', [
            'status' => $status,
            'message' => $message,
            'data' => $returnData,
            'ids' => $ids
        ]);
    }
}

?>