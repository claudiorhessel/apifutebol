<?php
namespace app\controllers\api\v1;

use app\core\Controller;
use app\models\LeaguesModel;
use app\validations\LeagueValidations;
use Helper;

class LeaguesApi extends Controller {
    public function index()
    {
        $params = [
            "id" => isset($_GET["id"])? $_GET["id"] : null,
            "referal_league_id" => isset($_GET["referal_league_id"])? $_GET["referal_league_id"] : null,
            "name" => isset($_GET["name"])? $_GET["name"] : null,
            "type" => isset($_GET["type"])? $_GET["type"] : null,
            "country" => isset($_GET["country"])? $_GET["country"] : null,
            "season" => isset($_GET["season"])? $_GET["season"] : null
        ];

        $leaguesModel = new LeaguesModel;
        $data = $leaguesModel->getAllLeagues($params);
		
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
        $leaguesModel = new LeaguesModel;
        $data = $leaguesModel->getLeagueById($id);
		
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

        $leaguesModel = new LeaguesModel;

        $dataLeague = [
            "referal_league_id" => $input["referal_league_id"],
            "name" => $input["name"],
            "type" => $input["type"],
            "country" => $input["country"],
            "country_code" => $input["country_code"],
            "season" => $input["season"],
            "season_start" => $input["season_start"],
            "season_end" => $input["season_end"],
            "logo" => $input["logo"],
            "flag" => $input["flag"],
            "standings" => $input["standings"],
            "is_current" => $input["is_current"]
        ];

        $leagueValidations = new LeagueValidations;
        $validations = $leagueValidations->validateInsert($dataLeague);

        if ($validations) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro na validação ao gravar liga",
                "validations" => $validations
            ];

            http_response_code($code);
            print_r(json_encode($return));
            die();
        }

        $leagueId = $leaguesModel->createLeague($dataLeague);

        $code = 201;
        $return = [
            "status" => "OK",
            "message" => "Liga cadastrado com sucesso",
            "data" => $leagueId
        ];

        if (!$leagueId) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro ao gravar liga"
            ];
        }

        http_response_code($code);
        print_r(json_encode($return));
        die();
    }

    public function update($id)
    {
        $input = json_decode(file_get_contents('php://input'), TRUE);

        $leaguesModel = new LeaguesModel;

        $dataLeague = [
            "referal_league_id" => $input["referal_league_id"],
            "name" => $input["name"],
            "type" => $input["type"],
            "country" => $input["country"],
            "country_code" => $input["country_code"],
            "season" => $input["season"],
            "season_start" => $input["season_start"],
            "season_end" => $input["season_end"],
            "logo" => $input["logo"],
            "flag" => $input["flag"],
            "standings" => $input["standings"],
            "is_current" => $input["is_current"]
        ];

        $leagueValidations = new LeagueValidations;
        $validations = $leagueValidations->validateUpdate($dataLeague, $id);

        if ($validations) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro na validação ao atualizar liga",
                "validations" => $validations
            ];

            http_response_code($code);
            print_r(json_encode($return));
            die();
        }

        $leagueUpdated = $leaguesModel->updateLeague($id, $dataLeague);

        $code = 200;
        $return = [
            "status" => "OK",
            "message" => "Liga atualizado com sucesso",
            "data" => $leagueUpdated
        ];

        if (!$leagueUpdated) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro ao atualizar liga"
            ];
        }

        http_response_code($code);
        print_r(json_encode($return));
        die();
    }

    public function destroy($id)
    {
        $leaguesModel = new LeaguesModel;

        $dataLeague = [
            "deletedAt" => date("Y-m-d H:i:s")
        ];

        $leagueUpdated = $leaguesModel->updateLeague($id, $dataLeague);

        $code = 200;
        $return = [
            "status" => "OK",
            "message" => "Liga deletada com sucesso",
            "data" => $leagueUpdated
        ];

        if (!$leagueUpdated) {
            $code = 401;
            $return = [
                "status" => "Erro",
                "message" => "Erro ao deletar liga"
            ];
        }

        http_response_code($code);
        print_r(json_encode($return));
        die();
    }
}