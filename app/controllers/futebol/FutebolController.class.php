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

    public function listTeams()
    {
        $teamsModel = new TeamsModel;
        $data = $teamsModel->getAllTeams();

        $this->load('apifutebol/teams_list', [
            'status' => true,
            'message' => "OK",
            'data' => $data,
        ]);
    }

    public function listLeagues()
    {
        $leaguesModel = new LeaguesModel;
        $data = $leaguesModel->getAllLeagues();

        $this->load('apifutebol/leagues_list', [
            'status' => true,
            'message' => "OK",
            'data' => $data,
        ]);
    }

    public function leagueDetail($id)
    {
        $leaguesModel = new LeaguesModel;
        $data = $leaguesModel->getLeagueById($id);

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

    public function teamDetail($id, $leagueId = null)
    {
        $teamsModel = new TeamsModel;
        $data = $teamsModel->getTeamById($id);

        $this->load('apifutebol/team_detail', [
            'status' => true,
            'message' => "OK",
            'data' => $data,
            'league_id' => $leagueId
        ]);
    }

    public function delete()
    {
        if(isset($_POST['delete_student']))
        {
            $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

            $query = "DELETE FROM students WHERE id='$student_id' ";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $_SESSION['message'] = "Aluno excluido com sucesso";
                header("Location: index.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Não foi possivel excluir o aluno";
                header("Location: index.php");
                exit(0);
            }
        }
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

        $dataLeagueToSave = Helper::dbPrepateData($dataLeague);

        $leagueCreated = $leaguesModel->createLeague($dataLeagueToSave);

        if ($leagueCreated) {
            $dataCoverage = [
                "league_id" => $leagueCreated,
                "standings" => isset($_POST["coverage_standings"])? $_POST["coverage_standings"] : "",
                "players" => isset($_POST["players"])? $_POST["players"] : "",
                "top_scorers" => isset($_POST["top_scorers"])? $_POST["top_scorers"] : "",
                "predictions" => isset($_POST["predictions"])? $_POST["predictions"] : "",
                "odds" => isset($_POST["odds"])? $_POST["odds"] : ""
            ];

            $dataCoverageToSave = Helper::dbPrepateData($dataCoverage);

            $coverageCreated = $coveragesModel->createCoverage($dataCoverageToSave);

            if ($coverageCreated) {
                $dataFixture = [
                    "coverage_id" => $coverageCreated,
                    "events" => isset($_POST["events"])? $_POST["events"] : "",
                    "lineups" => isset($_POST["lineups"])? $_POST["lineups"] : "",
                    "statistics" => isset($_POST["statistics"])? $_POST["statistics"] : "",
                    "players_statistics" => isset($_POST["players_statistics"])? $_POST["players_statistics"] : ""
                ];

                $dataFixtureToSave = Helper::dbPrepateData($dataFixture);

                $fixtureCreated = $fixturesModel->createFixture($dataFixtureToSave);

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

        $dataLeagueToUpdate = Helper::dbPrepateData($dataLeague);

        $leagueUpdated = $leaguesModel->updateLeague($leagueId, $dataLeagueToUpdate);

        if ($leagueUpdated) {
            $coverageId = $_POST["coverage_id"];
            $dataCoverage = [
                "league_id" => isset($_POST["league_id"])? $_POST["league_id"] : "",
                "standings" => isset($_POST["coverage_standings"])? $_POST["coverage_standings"] : "",
                "players" => isset($_POST["players"])? $_POST["players"] : "",
                "top_scorers" => isset($_POST["top_scorers"])? $_POST["top_scorers"] : "",
                "predictions" => isset($_POST["predictions"])? $_POST["predictions"] : "",
                "odds" => isset($_POST["odds"])? $_POST["odds"] : ""
            ];

            $dataCoverageToSave = Helper::dbPrepateData($dataCoverage);

            $coverageUpdated = $coveragesModel->updateCoverage($coverageId, $dataCoverageToSave);

            if ($coverageUpdated) {
                $fixtureId = $_POST["fixture_id"];

                $dataFixture = [
                    "coverage_id" => isset($_POST["coverage_id"])? $_POST["coverage_id"] : "",
                    "events" => isset($_POST["events"])? $_POST["events"] : "",
                    "lineups" => isset($_POST["lineups"])? $_POST["lineups"] : "",
                    "statistics" => isset($_POST["statistics"])? $_POST["statistics"] : "",
                    "players_statistics" => isset($_POST["players_statistics"])? $_POST["players_statistics"] : ""
                ];

                $dataFixtureToSave = Helper::dbPrepateData($dataFixture);

                $fixtureUpdated = $fixturesModel->updateFixture($fixtureId, $dataFixtureToSave);

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

    public function teamAdd()
    {
        $this->load('apifutebol/team_add', [
            'status' => true,
            'message' => "OK",
            'data' => $_POST
        ]);
    }

    public function teamSave()
    {
        $ids = [];
        $status = false;
        $message = "Erro ao criar time.";
        $teamsModel = new TeamsModel;

        $dataTeam = [
            "referal_team_id" => isset($_POST["referal_team_id"])? $_POST["referal_team_id"] : null,
            "league_id" => isset($_POST["league_id"])? $_POST["league_id"] : null,
            "name" => isset($_POST["name"])? $_POST["name"] : null,
            "code" => isset($_POST["code"])? $_POST["code"] : null,
            "logo" => isset($_POST["logo"])? $_POST["logo"] : null,
            "country" => isset($_POST["country"])? $_POST["country"] : null,
            "is_national" => isset($_POST["is_national"])? $_POST["is_national"] : null,
            "founded" => isset($_POST["founded"])? $_POST["founded"] : null,
            "venue_name" => isset($_POST["venue_name"])? $_POST["venue_name"] : null,
            "venue_surface" => isset($_POST["venue_surface"])? $_POST["venue_surface"] : null,
            "venue_address" => isset($_POST["venue_address"])? $_POST["venue_address"] : null,
            "venue_city" => isset($_POST["venue_city"])? $_POST["venue_city"] : null,
            "venue_capacity" => isset($_POST["venue_capacity"])? $_POST["venue_capacity"] : null
        ];

        $dataTeamToSave = Helper::dbPrepateData($dataTeam);

        $teamCreated = $teamsModel->createTeam($dataTeamToSave);

        if ($teamCreated) {
            $status = true;
            $message = "Liga criada com sucesso.";
            
            Helper::redirect('/teams_list');
        }

        $this->load('apifutebol/team_add', [
            'status' => $status,
            'message' => $message,
            'data' => $_POST,
            'ids' => $ids
        ]);
    }

    public function teamUpdate()
    {
        $this->load('apifutebol/team_add', [
            'status' => true,
            'message' => "OK",
            'data' => $_POST
        ]);
    }
}

?>