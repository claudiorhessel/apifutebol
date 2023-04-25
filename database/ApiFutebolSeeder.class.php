<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../config/App.php");
require_once("../app/services/rapidapi/api-football/v2/ApiFutebolService.class.php");
class ApiFutebolSeeder
{
    public function seed()
    {
        $log = [];
        $log[] = "APIFUTEBOLSEEDER - " . date('Y-m-d H:i:s') . " - INICIO DO PROCESSO. <BR />";
        $api_futebol = new ApiFutebolService;
        $leagues = $api_futebol->getLeaguesByTypeFilteredByCountryAndSeason();
        $dataToReturn = [];

        if (isset($leagues["api"])) {
            $log[] = "APIFUTEBOLSEEDER - " . date('Y-m-d H:i:s') . " - TOTAL DE LIGAS: " . $leagues["api"]["results"] . ". <BR />";
            foreach ($leagues["api"]["leagues"] as $leagueData) {
                $dataLeagueToSave = [];
                $dataLeagueToSave["league"]["referal_league_id"] = $leagueData["league_id"];
                $dataLeagueToSave["league"]["name"] = $leagueData["name"];
                $dataLeagueToSave["league"]["type"] = $leagueData["type"];
                $dataLeagueToSave["league"]["country"] = $leagueData["country"];
                $dataLeagueToSave["league"]["country_code"] = $leagueData["country_code"];
                $dataLeagueToSave["league"]["season"] = $leagueData["season"];
                $dataLeagueToSave["league"]["season_start"] = $leagueData["season_start"];
                $dataLeagueToSave["league"]["season_end"] = $leagueData["season_end"];
                $dataLeagueToSave["league"]["logo"] = $leagueData["logo"];
                $dataLeagueToSave["league"]["flag"] = $leagueData["flag"];
                $dataLeagueToSave["league"]["standings"] = $leagueData["standings"];
                $dataLeagueToSave["league"]["is_current"] = $leagueData["is_current"];
                
                $dataLeagueToSave["coverage"]["standings"] = filter_var($leagueData["coverage"]["standings"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["coverage"]["players"] = filter_var($leagueData["coverage"]["players"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["coverage"]["top_scorers"] = filter_var($leagueData["coverage"]["topScorers"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["coverage"]["predictions"] = filter_var($leagueData["coverage"]["predictions"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["coverage"]["odds"] = filter_var($leagueData["coverage"]["odds"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                
                $dataLeagueToSave["fixtures"]["events"] = filter_var($leagueData["coverage"]["fixtures"]["events"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["fixtures"]["lineups"] = filter_var($leagueData["coverage"]["fixtures"]["lineups"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["fixtures"]["statistics"] = filter_var($leagueData["coverage"]["fixtures"]["statistics"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                $dataLeagueToSave["fixtures"]["players_statistics"] = filter_var($leagueData["coverage"]["fixtures"]["players_statistics"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';

                $CadastraLeague = new Create;
                $CadastraLeague->ExeCreate('leagues', $dataLeagueToSave["league"]);
            
                if ($CadastraLeague->getResult()) {
                    $leagueId = $CadastraLeague->getResult();
                    $log[] = "APIFUTEBOLSEEDER[" . $leagueData["league_id"] . "] - " . date('Y-m-d H:i:s') . " - LIGA COM ID '" . $leagueData["league_id"] . "' GRAVADA COM SUCESSO. <BR />";

                    $dataLeagueToSave["coverage"]["league_id"] = $leagueId;
                    $CadastraCoverage = new Create;
                    $CadastraCoverage->ExeCreate('coverages', $dataLeagueToSave["coverage"]);

                    if ($CadastraCoverage->getResult()) {
                        $coverageId = $CadastraCoverage->getResult();
                        $log[] = "APIFUTEBOLSEEDER[" . $leagueData["league_id"] . "] - " . date('Y-m-d H:i:s') . " - COVERAGE COM ID '" . $coverageId . "' GRAVADO COM SUCESSO. <BR />";
                        $dataLeagueToSave["fixtures"]["coverage_id"] = $coverageId;

                        $CadastraFixtures = new Create;
                        $CadastraFixtures->ExeCreate('fixtures', $dataLeagueToSave["fixtures"]);
        
                        if ($CadastraFixtures->getResult()) {
                            $fixturesId = $CadastraFixtures->getResult();
                            $log[] = "APIFUTEBOLSEEDER[" . $leagueData["league_id"] . "] - " . date('Y-m-d H:i:s') . " - FIXTURES COM ID '" . $fixturesId . "' GRAVADO COM SUCESSO. <BR />";
                        }
                    }

                    $teams = $api_futebol->getTeamsFromLeagueId($leagueData["league_id"]);
                    if (isset($teams["api"])) {
                        $log[] = "APIFUTEBOLSEEDER[" . $leagueData["league_id"] . "] - " . date('Y-m-d H:i:s') . " - TOTAL DE TIMES: " . $teams["api"]["results"] . ". <BR />";
                        
                        $teamDataToSave = [];
                        foreach ($teams["api"]["teams"] as $teamData) {
                            $teamDataToSave["league_id"] = $leagueId;
                            $teamDataToSave["referal_league_id"] = $leagueData["league_id"];
                            $teamDataToSave["referal_team_id"] = $teamData["team_id"];
                            $teamDataToSave["name"] = $teamData["name"];
                            $teamDataToSave["code"] = $teamData["code"];
                            $teamDataToSave["logo"] = $teamData["logo"];
                            $teamDataToSave["country"] = $teamData["country"];
                            $teamDataToSave["is_national"] = filter_var($teamData["is_national"], FILTER_VALIDATE_BOOLEAN) === true ? '1' : '0';
                            $teamDataToSave["founded"] = $teamData["founded"];
                            $teamDataToSave["venue_name"] = $teamData["venue_name"];
                            $teamDataToSave["venue_surface"] = $teamData["venue_surface"];
                            $teamDataToSave["venue_address"] = $teamData["venue_address"];
                            $teamDataToSave["venue_city"] = $teamData["venue_city"];
                            $teamDataToSave["venue_capacity"] = $teamData["venue_capacity"];
                            
                            $CadastraTeams = new Create;
                            $CadastraTeams->ExeCreate('teams', $teamDataToSave);
                            if ($CadastraTeams->getResult()) {
                                $teamId = $CadastraTeams->getResult();
                                $log[] = "APIFUTEBOLSEEDER[" . $leagueData["league_id"] . "][" . $teamData["team_id"] . "] - " . date('Y-m-d H:i:s') . " - TIME COM ID '" . $teamData["team_id"] . "' GRAVADO COM SUCESSO. <BR />";
                                $dataToReturn[$leagueId] = $teamId;
                            }
                        }
                    }
                }
            }
        }

        $log[] = "APIFUTEBOLSEEDER - " . date('Y-m-d H:i:s') . " - FIM DO PROCESSO. <BR />";

        $return['status'] = true;
        $return['message'] = "OK";
        $return['data'] = $dataToReturn;
        $return['log'] = $log;

        return $return;
    }

    private function saveLeague($league)
    {

    }

    private function saveCoverage($coverage)
    {
        
    }

    private function saveFixture($fixture)
    {
        
    }

    private function saveTeam($team)
    {
        
    }
}