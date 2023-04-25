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
                        <?php
                        if ($params['status'] && $params['status'] != "OK") {
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?= $params['message']; ?>
                        </div>
                        <?php
                        }
                        if (!$params['status']) {
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= $params['message']; ?>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="card-body">
                            <form action="/league_update/<?= $params["data"]["league_id"]; ?>" method="POST">
                                <input 
                                    type="hidden"
                                    name="league_id"
                                    id="league_id"
                                    class="form-control"
                                    value="<?= $params["data"]["league_id"]; ?>"
                                >
                                <input 
                                    type="hidden"
                                    name="coverage_id"
                                    id="coverage_id"
                                    class="form-control"
                                    value="<?= $params["data"]["coverage_id"]; ?>"
                                >
                                <input 
                                    type="hidden"
                                    name="fixture_id"
                                    id="fixture_id"
                                    class="form-control"
                                    value="<?= $params["data"]["fixture_id"]; ?>"
                                >
                                <div class="mb-3">
                                    <label>referal_league_id:</label>
                                    <input 
                                        type="number"
                                        name="referal_league_id"
                                        id="referal_league_id"
                                        class="form-control <?= isset($params['validations']['referal_league_id'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["referal_league_id"])? $params["data"]["referal_league_id"] : null; ?>"
                                    >
                                    <?php
                                    if (isset($params['validations']['referal_league_id'])) {
                                        foreach($params['validations']['referal_league_id'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>name:</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control <?= isset($params['validations']['name'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["name"])? $params["data"]["name"] : null; ?>"

                                    >
                                    <?php
                                    if (isset($params['validations']['name'])) {
                                        foreach($params['validations']['name'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>type:</label>
                                    <input
                                        type="text"
                                        name="type"
                                        id="type"
                                        class="form-control <?= isset($params['validations']['type'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["type"])? $params["data"]["type"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['type'])) {
                                        foreach($params['validations']['type'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>country:</label>
                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        class="form-control <?= isset($params['validations']['country'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["country"])? $params["data"]["country"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['country'])) {
                                        foreach($params['validations']['country'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>country_code:</label>
                                    <input
                                        type="text"
                                        maxlength="2"
                                        name="country_code"
                                        id="country_code"
                                        class="form-control <?= isset($params['validations']['country_code'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["country_code"])? $params["data"]["country_code"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['country_code'])) {
                                        foreach($params['validations']['country_code'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>season:</label>
                                    <input
                                        type="number"
                                        maxlength="4"
                                        name="season"
                                        id="season"
                                        class="form-control <?= isset($params['validations']['season'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["season"])? $params["data"]["season"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['season'])) {
                                        foreach($params['validations']['season'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>season_start:</label>
                                    <input
                                        type="date"
                                        name="season_start"
                                        id="season_start"
                                        class="form-control <?= isset($params['validations']['season_start'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["season_start"])? $params["data"]["season_start"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['season_start'])) {
                                        foreach($params['validations']['season_start'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>season_end:</label>
                                    <input
                                        type="date"
                                        name="season_end"
                                        id="season_end"
                                        class="form-control <?= isset($params['validations']['season_end'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["season_end"])? $params["data"]["season_end"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['season_end'])) {
                                        foreach($params['validations']['season_end'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>logo:</label>
                                    <input
                                        type="text"
                                        name="logo"
                                        id="logo"
                                        class="form-control <?= isset($params['validations']['logo'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["logo"])? $params["data"]["logo"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['logo'])) {
                                        foreach($params['validations']['logo'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label>flag:</label>
                                    <input
                                        type="text"
                                        name="flag" 
                                        id="flag"
                                        class="form-control <?= isset($params['validations']['flag'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["flag"])? $params["data"]["flag"] : null; ?>"
                                        
                                    >
                                    <?php
                                    if (isset($params['validations']['flag'])) {
                                        foreach($params['validations']['flag'] as $value) {
                                    ?>
                                        
                                    <div class="invalid-feedback">
                                            <?= $value["message"]; ?>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['standings'])? 'is-invalid form-control' : ''; ?>">
                                            <label for="standings_true" class="form-label">standings:</label>
                                            <br />
                                            <div class="form-check form-check-inline">
                                                <input
                                                    type="radio"
                                                    name="standings"
                                                    id="standings_true"
                                                    value="1"
                                                    class="form-check-input"
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
                                                    class="form-check-input"
                                                    <?= isset($params["data"]["standings"]) && $params["data"]["standings"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="standings_false">
                                                    0
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['standings'])) {
                                            foreach($params['validations']['standings'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['is_current'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["is_current"]) && $params["data"]["is_current"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="is_current_false">
                                                    0
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['is_current'])) {
                                            foreach($params['validations']['is_current'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['coverage_standings'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["coverage_standings"]) && $params["data"]["coverage_standings"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="coverage_standings_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['coverage_standings'])) {
                                            foreach($params['validations']['coverage_standings'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['players'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["players"]) && $params["data"]["players"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="players_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['players'])) {
                                            foreach($params['validations']['players'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['top_scorers'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["top_scorers"]) && $params["data"]["top_scorers"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="top_scorers_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['top_scorers'])) {
                                            foreach($params['validations']['top_scorers'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['predictions'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["predictions"]) && $params["data"]["predictions"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="predictions_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['predictions'])) {
                                            foreach($params['validations']['predictions'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['odds'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["odds"]) && $params["data"]["odds"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="odds_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['odds'])) {
                                            foreach($params['validations']['odds'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['events'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["events"]) && $params["data"]["events"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="events_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['events'])) {
                                            foreach($params['validations']['events'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['lineups'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["lineups"]) && $params["data"]["lineups"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="lineups_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['lineups'])) {
                                            foreach($params['validations']['lineups'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['statistics'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["statistics"]) && $params["data"]["statistics"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="statistics_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['statistics'])) {
                                            foreach($params['validations']['statistics'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['players_statistics'])? 'is-invalid form-control' : ''; ?>">
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
                                                    
                                                    <?= isset($params["data"]["players_statistics"]) && $params["data"]["players_statistics"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="players_statistics_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['players_statistics'])) {
                                            foreach($params['validations']['players_statistics'] as $value) {
                                        ?>
                                            
                                        <div class="invalid-feedback">
                                                <?= $value["message"]; ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_league" class="btn btn-primary">Salvar Liga</button>
                                    <a href="/leagues_list" class="btn btn-primary float-end">Voltar</a>
                                </div>
                            </form>
                            <h3>Times</h3>
                            <?php
                                if(isset($params["data"]) && isset($params["data"]["teams"]) && $params["data"]["teams"]) {
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>referal_team_id</th>
                                        <th>name</th>
                                        <th>code</th>
                                        <th>country</th>
                                        <th>founded</th>
                                        <th>venue_name</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($params["data"]["teams"] as $time) {
                                    ?>
                                    <tr>
                                        <td><?= $time['referal_team_id']; ?></td>
                                        <td><?= $time['name']; ?></td>
                                        <td><?= $time['code']; ?></td>
                                        <td><?= $time['country']; ?></td>
                                        <td><?= $time['founded']; ?></td>
                                        <td><?= $time['venue_name']; ?></td>
                                        <td>
                                            <a href="/team_detail/<?= $time['id']; ?>?league_id=<?= $params["data"]["league_id"]; ?>" class="btn btn-info btn-sm">Detalhes</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            <?php
                                } else {
                                    echo "<h5> Nenhum dado cadastrado </h5>";
                                }
                            ?>
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
