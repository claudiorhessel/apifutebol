<?php
namespace app\controllers\futebol;

use app\core\Controller;
use app\models\CoveragesModel;
use app\models\FixturesModel;
use app\models\LeaguesModel;
use app\models\TeamsModel;
use app\validations\TeamValidations;
use Helper;

class TeamsController extends Controller {
    public function listTeams()
    {
        $params = [
            "name" => isset($_GET["name"])? $_GET["name"] : null,
            "founded" => isset($_GET["founded"])? $_GET["founded"] : null,
            "referal_team_id" => isset($_GET["referal_team_id"])? $_GET["referal_team_id"] : null,
            "code" => isset($_GET["code"])? $_GET["code"] : null,
            "venue_name" => isset($_GET["venue_name"])? $_GET["venue_name"] : null
        ];

        $teamsModel = new TeamsModel;
        $data = $teamsModel->getAllTeams($params);

        $this->load('apifutebol/teams_list', [
            'status' => true,
            'message' => "OK",
            'data' => $data,
            'search' => $params
        ]);
    }

    public function teamDetail($id)
    {
        $leagueId = isset($_GET["league_id"])? $_GET["league_id"] : null;
        $teamsModel = new TeamsModel;
        $data = $teamsModel->getTeamById($id);

        if (!$data) {
            $return["status"] = false;
            $return["message"] = "Nenhum dado encontrado";

            return $return;
        }

        $this->load('apifutebol/team_detail', [
            'status' => true,
            'message' => "OK",
            'data' => $data[0],
            'league_id' => $leagueId
        ]);
    }

    public function teamDelete($id)
    {
        $teamsModel = new TeamsModel;

        $dataTeam = [
            "deletedAt" => date("Y-m-d H:i:s")
        ];

        $teamUpdated = $teamsModel->updateTeam($id, $dataTeam);

        Helper::redirect('/teams_list');
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
            "referal_league_id" => isset($_POST["referal_league_id"])? $_POST["referal_league_id"] : null,
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

        $teamValidations = new TeamValidations;
        $validations = $teamValidations->validateInsert($dataTeam);

        if ($validations) {
            $this->load('apifutebol/team_add', [
                'status' => false,
                'message' => 'Erro ao validar os dados',
                'data' => $_POST,
                'ids' => $ids,
                'validations' => $validations
            ]);

            exit();
        }

        $teamCreated = $teamsModel->createTeam($dataTeam);

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

    public function teamUpdate($id)
    {
        $ids = [];
        $status = false;
        $message = "Erro ao criar time.";
        $teamsModel = new TeamsModel;

        $dataTeam = [
            "referal_team_id" => isset($_POST["referal_team_id"])? $_POST["referal_team_id"] : null,
            "referal_league_id" => isset($_POST["referal_league_id"])? $_POST["referal_league_id"] : null,
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

        $teamValidations = new TeamValidations;
        $validations = $teamValidations->validateUpdate($dataTeam, $id);

        if ($validations) {
            $this->load('apifutebol/team_add', [
                'status' => false,
                'message' => 'Erro ao validar os dados',
                'data' => $_POST,
                'ids' => $ids,
                'validations' => $validations
            ]);

            exit();
        }

        $teamUpdated = $teamsModel->updateTeam($id, $dataTeam);

        if ($teamUpdated) {
            $status = true;
            $message = "Liga atualizada com sucesso.";
            
            Helper::redirect('/teams_list');
        }

        $this->load('apifutebol/team_add', [
            'status' => $status,
            'message' => $message,
            'data' => $_POST,
            'ids' => $ids
        ]);
    }
}

?>