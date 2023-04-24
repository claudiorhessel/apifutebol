<?php
namespace app\validations;

use app\core\Validation;
use app\models\LeaguesModel;
use Helper;

class TeamValidations extends Validation
{
    public function validateInsert($params)
    {
        $return = [];
        if ($this->required("league_id", $params["league_id"])) {
            $return[] = $this->required("league_id", $params["league_id"]);
        }
        if ($this->int("league_id", $params["league_id"])) {
            $return[] = $this->int("league_id", $params["league_id"]);
        }
        if ($this->int("referal_league_id", $params["referal_league_id"])) {
            $return[] = $this->int("referal_league_id", $params["referal_league_id"]);
        }
        if ($this->int("referal_team_id", $params["referal_team_id"])) {
            $return[] = $this->int("referal_team_id", $params["referal_team_id"]);
        }
        if ($this->required("name", $params["name"])) {
            $return[] = $this->required("name", $params["name"]);
        }
        if ($this->required("code", $params["code"])) {
            $return[] = $this->required("code", $params["code"]);
        }
        if ($this->required("country", $params["country"])) {
            $return[] = $this->required("country", $params["country"]);
        }

        if (count($return) == 0) {
            $leagueModel = new LeaguesModel;
            $leagueData = $leagueModel->getLeagueById($params["league_id"]);
            if (!$leagueData) {
                $return[] = [
                    "field" => "league_id",
                    "value" => $params["league_id"],
                    "message" => "Nenhuma liga encontrada para o valor de 'league_id' informado"
                ];
            }
            $referalLeagueData = $leagueModel->getLeagueByReferalLeagueId($params["referal_league_id"]);
            if (!$referalLeagueData) {
                $return[] = [
                    "field" => "referal_league_id",
                    "value" => $params["referal_league_id"],
                    "message" => "Nenhuma liga encontrada para o valor de 'referal_league_id' informado"
                ];
            }
        }

        if (count($return)) {
            return $return;
        }

        return false;
    }

    public function validateUpdate($params, $id)
    {
        $return = [];
        if ($this->required("id", $id)) {
            $return[] = $this->required("id", $id);
        }
        if ($this->required("league_id", $params["league_id"])) {
            $return[] = $this->required("league_id", $params["league_id"]);
        }
        if ($this->int("league_id", $params["league_id"])) {
            $return[] = $this->int("league_id", $params["league_id"]);
        }
        if ($this->int("referal_league_id", $params["referal_league_id"])) {
            $return[] = $this->int("referal_league_id", $params["referal_league_id"]);
        }
        if ($this->int("referal_team_id", $params["referal_team_id"])) {
            $return[] = $this->int("referal_team_id", $params["referal_team_id"]);
        }
        if ($this->required("name", $params["name"])) {
            $return[] = $this->required("name", $params["name"]);
        }
        if ($this->required("code", $params["code"])) {
            $return[] = $this->required("code", $params["code"]);
        }
        if ($this->required("country", $params["country"])) {
            $return[] = $this->required("country", $params["country"]);
        }

        if (count($return) == 0) {
            $leagueModel = new LeaguesModel;
            $leagueData = $leagueModel->getLeagueById($params["league_id"]);
            if (!$leagueData) {
                $return[] = [
                    "field" => "league_id",
                    "value" => $params["league_id"],
                    "message" => "Nenhuma liga encontrada para o valor de 'league_id' informado"
                ];
            }
            $referalLeagueData = $leagueModel->getLeagueByReferalLeagueId($params["referal_league_id"]);
            if (!$referalLeagueData) {
                $return[] = [
                    "field" => "referal_league_id",
                    "value" => $params["referal_league_id"],
                    "message" => "Nenhuma liga encontrada para o valor de 'referal_league_id' informado"
                ];
            }
        }

        if (count($return)) {
            return $return;
        }

        return false;
    }
}