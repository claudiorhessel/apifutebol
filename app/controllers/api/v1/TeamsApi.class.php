<?php
namespace app\controllers\api\v1;

use app\core\Controller;
use app\models\TeamsModel;
use Helper;

class TeamsApi extends Controller {
    public function index()
    {
        $params = [
            "id" => isset($_GET["id"])? $_GET["id"] : null,
            "name" => isset($_GET["name"])? $_GET["name"] : null,
            "code" => isset($_GET["code"])? $_GET["code"] : null,
            "country" => isset($_GET["country"])? $_GET["country"] : null,
            "referal_league_id" => isset($_GET["referal_league_id"])? $_GET["referal_league_id"] : null,
            "league_id" => isset($_GET["league_id"])? $_GET["league_id"] : null,
            "league" => isset($_GET["league"])? $_GET["league"] : null
        ];

        $teamsModel = new TeamsModel;
        $data = $teamsModel->getAllTeams($params);
        
        http_response_code(200);
        $return = [
            "status" => "OK",
            "data" => $data
        ];

        print_r(json_encode($return));
        die();
    }

    public function show($id)
    {
        $teamsModel = new TeamsModel;
        $data = $teamsModel->getTeamById($id);
        
        http_response_code(200);
        $return = [
            "status" => "OK",
            "data" => $data
        ];

        print_r(json_encode($return));
        die();
    }

    public function store()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $teamsModel = new TeamsModel;

        $dataTeam = [
            "league_id" => $input["league_id"],
            "referal_league_id" => $input["referal_league_id"],
            "referal_team_id" => $input["referal_team_id"],
            "name" => $input["name"],
            "code" => $input["code"],
            "logo" => $input["logo"],
            "country" => $input["country"],
            "is_national" => $input["is_national"],
            "founded" => $input["founded"],
            "venue_name" => $input["venue_name"],
            "venue_surface" => $input["venue_surface"],
            "venue_address" => $input["venue_address"],
            "venue_city" => $input["venue_city"],
            "venue_capacity" => $input["venue_capacity"]
        ];

        $teamId = $teamsModel->createTeam($dataTeam);

        $code = 201;
        $return = [
            "status" => "OK",
            "message" => "Time cadastrado com sucesso",
            "data" => $teamId
        ];

        if (!$teamId) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro ao gravar time"
            ];
        }

        http_response_code($code);
        print_r(json_encode($return));
        die();
    }

    public function update($id)
    {
        $input = json_decode(file_get_contents('php://input'), TRUE);

        $teamsModel = new TeamsModel;

        $dataTeam = [
            "league_id" => $input["league_id"],
            "referal_league_id" => $input["referal_league_id"],
            "referal_team_id" => $input["referal_team_id"],
            "name" => $input["name"],
            "code" => $input["code"],
            "logo" => $input["logo"],
            "country" => $input["country"],
            "is_national" => $input["is_national"],
            "founded" => $input["founded"],
            "venue_name" => $input["venue_name"],
            "venue_surface" => $input["venue_surface"],
            "venue_address" => $input["venue_address"],
            "venue_city" => $input["venue_city"],
            "venue_capacity" => $input["venue_capacity"]
        ];

        $teamUpdated = $teamsModel->updateTeam($id, $dataTeam);

        $code = 200;
        $return = [
            "status" => "OK",
            "message" => "Time atualizado com sucesso",
            "data" => $teamUpdated
        ];

        if (!$teamUpdated) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro ao atualizar time"
            ];
        }

        http_response_code($code);
        print_r(json_encode($return));
        die();
    }

    public function destroy($id)
    {
        $teamsModel = new TeamsModel;

        $dataTeam = [
            "deletedAt" => date("Y-m-d H:i:s")
        ];

        $teamUpdated = $teamsModel->updateTeam($id, $dataTeam);

        $code = 200;
        $return = [
            "status" => "OK",
            "message" => "Time deletado com sucesso",
            "data" => $teamUpdated
        ];

        if (!$teamUpdated) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro ao deletar time"
            ];
        }

        http_response_code($code);
        print_r(json_encode($return));
        die();
    }
}