<?php
namespace app\controllers\api\v1;

use app\core\Controller;
use app\models\TeamsModel;
use app\validations\TeamValidations;
use Exception;
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
            "league_id" => isset($input["league_id"])? $input["league_id"] : "" ,
            "referal_league_id" => isset($input["referal_league_id"])? $input["referal_league_id"] : "",
            "referal_team_id" => isset($input["referal_team_id"])? $input["referal_team_id"] : "",
            "name" => isset($input["name"])? $input["name"] : "",
            "code" => isset($input["code"])? $input["code"] : "",
            "logo" => isset($input["logo"])? $input["logo"] : "",
            "country" => isset($input["country"])? $input["country"] : "",
            "is_national" => isset($input["is_national"])? $input["is_national"] : "",
            "founded" => isset($input["founded"])? $input["founded"] : "",
            "venue_name" => isset($input["venue_name"])? $input["venue_name"] : "",
            "venue_surface" => isset($input["venue_surface"])? $input["venue_surface"] : "",
            "venue_address" => isset($input["venue_address"])? $input["venue_address"] : "",
            "venue_city" => isset($input["venue_city"])? $input["venue_city"] : "",
            "venue_capacity" => isset($input["venue_capacity"])? $input["venue_capacity"] : ""
        ];

        $teamValidations = new TeamValidations;
        $validations = $teamValidations->validateInsert($dataTeam);

        if ($validations) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro na validação ao gravar time",
                "validations" => $validations
            ];

            http_response_code($code);
            print_r(json_encode($return));
            die();
        }

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
        try {
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

            $teamValidations = new TeamValidations;
            $validations = $teamValidations->validateUpdate($dataTeam, $id);

            if ($validations) {
                $code = 401;
                $return = [
                    "status" => "Erro",
                    "message" => "Erro na validação ao atualizar time",
                    "validations" => $validations
                ];

                http_response_code($code);
                print_r(json_encode($return));
                die();
            }

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
        } catch (Exception $e) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Exceção capturada: ",  $e->getMessage(), "\n"
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

        $teamDeleted = $teamsModel->updateTeam($id, $dataTeam);

        $code = 200;
        $return = [
            "status" => "OK",
            "message" => "Time deletado com sucesso",
            "data" => $teamDeleted
        ];

        if (!$teamDeleted) {
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