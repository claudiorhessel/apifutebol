<?php
namespace app\validations;

use app\core\Validation;
use app\models\LeaguesModel;
use Helper;

class LeagueValidations extends Validation
{
    public function validateInsert($params)
    {
        $return = [];
        if ($this->int("referal_league_id", $params["referal_league_id"])) {
            $return[] = $this->int("referal_league_id", $params["referal_league_id"]);
        }
        if ($this->required("name", $params["name"])) {
            $return[] = $this->required("name", $params["name"]);
        }
        if ($this->required("type", $params["type"])) {
            $return[] = $this->required("type", $params["type"]);
        }
        if ($this->required("country", $params["country"])) {
            $return[] = $this->required("country", $params["country"]);
        }
        if ($this->required("country_code", $params["country_code"])) {
            $return[] = $this->required("country_code", $params["country_code"]);
        }
        if ($this->required("season", $params["season"])) {
            $return[] = $this->required("season", $params["season"]);
        }
        if ($this->int("season", $params["season"])) {
            $return[] = $this->int("season", $params["season"]);
        }
        if ($this->int("season", $params["season"])) {
            $return[] = $this->max("season", $params["season"], '4');
        }
        if ($this->int("season", $params["season"])) {
            $return[] = $this->min("season", $params["season"], '4');
        }
        if ($this->required("season_start", $params["season_start"])) {
            $return[] = $this->required("season_start", $params["season_start"]);
        }
        if ($this->required("season_start", $params["season_start"])) {
            $return[] = $this->date("season_start", $params["season_start"]);
        }
        if ($this->required("season_end", $params["season_end"])) {
            $return[] = $this->required("season_end", $params["season_end"]);
        }
        if ($this->required("season_end", $params["season_end"])) {
            $return[] = $this->date("season_end", $params["season_end"]);
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
        if ($this->int("referal_league_id", $params["referal_league_id"])) {
            $return[] = $this->int("referal_league_id", $params["referal_league_id"]);
        }
        if ($this->required("name", $params["name"])) {
            $return[] = $this->required("name", $params["name"]);
        }
        if ($this->required("type", $params["type"])) {
            $return[] = $this->required("type", $params["type"]);
        }
        if ($this->required("country", $params["country"])) {
            $return[] = $this->required("country", $params["country"]);
        }
        if ($this->required("country_code", $params["country_code"])) {
            $return[] = $this->required("country_code", $params["country_code"]);
        }
        if ($this->required("season", $params["season"])) {
            $return[] = $this->required("season", $params["season"]);
        }
        if ($this->int("season", $params["season"])) {
            $return[] = $this->int("season", $params["season"]);
        }
        if ($this->int("season", $params["season"])) {
            $return[] = $this->max("season", $params["season"], '4');
        }
        if ($this->int("season", $params["season"])) {
            $return[] = $this->min("season", $params["season"], '4');
        }
        if ($this->required("season_start", $params["season_start"])) {
            $return[] = $this->required("season_start", $params["season_start"]);
        }
        if ($this->required("season_start", $params["season_start"])) {
            $return[] = $this->date("season_start", $params["season_start"]);
        }
        if ($this->required("season_end", $params["season_end"])) {
            $return[] = $this->required("season_end", $params["season_end"]);
        }
        if ($this->required("season_end", $params["season_end"])) {
            $return[] = $this->date("season_end", $params["season_end"]);
        }

        if (count($return)) {
            return $return;
        }

        return false;
    }
}