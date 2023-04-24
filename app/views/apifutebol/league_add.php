<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futebol</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>  
    <div class="container-xxl mt-5">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Liga - Detalhe</h4>
                        </div>
                        <div class="card-body">
                            <form action="/league_save" method="POST">
                                <div class="mb-3">
                                    <label>referal_league_id:</label>
                                    <input 
                                        type="number"
                                        name="referal_league_id"
                                        id="referal_league_id"
                                        class="form-control"
                                        value="<?= isset($params["data"]["referal_league_id"])? $params["data"]["referal_league_id"] : null; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>name:</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="<?= isset($params["data"]["name"])? $params["data"]["name"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>type:</label>
                                    <input
                                        type="text"
                                        name="type"
                                        id="type"
                                        class="form-control"
                                        value="<?= isset($params["data"]["type"])? $params["data"]["type"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>country:</label>
                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        class="form-control"
                                        value="<?= isset($params["data"]["country"])? $params["data"]["country"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>country_code:</label>
                                    <input
                                        type="text"
                                        maxlength="2"
                                        name="country_code"
                                        id="country_code"
                                        class="form-control"
                                        value="<?= isset($params["data"]["country_code"])? $params["data"]["country_code"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>season:</label>
                                    <input
                                        type="number"
                                        maxlength="4"
                                        name="season"
                                        id="season"
                                        class="form-control"
                                        value="<?= isset($params["data"]["season"])? $params["data"]["season"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>season_start:</label>
                                    <input
                                        type="date"
                                        name="season_start"
                                        id="season_start"
                                        class="form-control"
                                        value="<?= isset($params["data"]["season_start"])? $params["data"]["season_start"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>season_end:</label>
                                    <input
                                        type="date"
                                        name="season_end"
                                        id="season_end"
                                        class="form-control"
                                        value="<?= isset($params["data"]["season_end"])? $params["data"]["season_end"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>logo:</label>
                                    <input
                                        type="text"
                                        name="logo"
                                        id="logo"
                                        class="form-control"
                                        value="<?= isset($params["data"]["logo"])? $params["data"]["logo"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>flag:</label>
                                    <input
                                        type="text"
                                        name="flag" 
                                        id="flag"
                                        class="form-control"
                                        value="<?= isset($params["data"]["flag"])? $params["data"]["flag"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="standings_true" class="form-label">standings:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="standings"
                                            id="standings_true"
                                            value="1"
                                            <?= isset($params["data"]["standings"]) && $params["data"]["standings"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="standings_true" >
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="standings"
                                            id="standings_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["standings"]) && $params["data"]["standings"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="standings_false">
                                            0
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>is_current:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="is_current"
                                            id="is_current_true"
                                            value="1"
                                            <?= isset($params["data"]["is_current"]) && $params["data"]["is_current"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="is_current_true" >
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="is_current"
                                            id="is_current_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["is_current"]) && $params["data"]["is_current"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="is_current_false">
                                            0
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>coverage - standings:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="coverage_standings"
                                            id="coverage_standings_true"
                                            value="1"
                                            <?= isset($params["data"]["coverage_standings"]) && $params["data"]["coverage_standings"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="coverage_standings_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="coverage_standings"
                                            id="coverage_standings_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["coverage_standings"]) && $params["data"]["coverage_standings"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="coverage_standings_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>coverage - players:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="players"
                                            id="players_true"
                                            value="1"
                                            <?= isset($params["data"]["players"]) && $params["data"]["players"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="players_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="players"
                                            id="players_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["players"]) && $params["data"]["players"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="players_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>coverage - topScorers:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="top_scorers"
                                            id="top_scorers_true"
                                            value="1"
                                            <?= isset($params["data"]["top_scorers"]) && $params["data"]["top_scorers"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="top_scorers_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="top_scorers"
                                            id="top_scorers_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["top_scorers"]) && $params["data"]["top_scorers"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="top_scorers_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>coverage - predictions:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="predictions"
                                            id="predictions_true"
                                            value="1"
                                            <?= isset($params["data"]["predictions"]) && $params["data"]["predictions"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="predictions_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="predictions"
                                            id="predictions_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["predictions"]) && $params["data"]["predictions"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="predictions_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>coverage - odds:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="odds"
                                            id="odds_true"
                                            value="1"
                                            <?= isset($params["data"]["odds"]) && $params["data"]["odds"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="odds_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="odds"
                                            id="odds_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["odds"]) && $params["data"]["odds"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="odds_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - events:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="events"
                                            id="events_true"
                                            value="1"
                                            <?= isset($params["data"]["events"]) && $params["data"]["events"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="events_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="events"
                                            id="events_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["events"]) && $params["data"]["events"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="events_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - lineups:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="lineups"
                                            id="lineups_true"
                                            value="1"
                                            <?= isset($params["data"]["lineups"]) && $params["data"]["lineups"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="lineups_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="lineups"
                                            id="lineups_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["lineups"]) && $params["data"]["lineups"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="lineups_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - statistics:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="statistics"
                                            id="statistics_true"
                                            value="1"
                                            <?= isset($params["data"]["statistics"]) && $params["data"]["statistics"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="statistics_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="statistics"
                                            id="statistics_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["statistics"]) && $params["data"]["statistics"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="statistics_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - players_statistics:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="players_statistics"
                                            id="players_statistics_true"
                                            value="1"
                                            <?= isset($params["data"]["players_statistics"]) && $params["data"]["players_statistics"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="players_statistics_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="players_statistics"
                                            id="players_statistics_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["players_statistics"]) && $params["data"]["players_statistics"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="players_statistics_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_student" class="btn btn-primary">Salvar Liga</button>
                                    <a href="/leagues_list" class="btn btn-primary float-end">Voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
