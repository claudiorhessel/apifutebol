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
                                        type="text"
                                        name="referal_league_id"
                                        id="referal_league_id"
                                        class="form-control"
                                        value="<?= $params["data"]["referal_league_id"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>name:</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="<?= $params["data"]["name"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>type:</label>
                                    <input
                                        type="text"
                                        name="type"
                                        id="type"
                                        class="form-control"
                                        value="<?= $params["data"]["type"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>country:</label>
                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        class="form-control"
                                        value="<?= $params["data"]["country"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>country_code:</label>
                                    <input
                                        type="text"
                                        name="country_code"
                                        id="country_code"
                                        class="form-control"
                                        value="<?= $params["data"]["country_code"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>season:</label>
                                    <input
                                        type="text"
                                        name="season"
                                        id="season"
                                        class="form-control"
                                        value="<?= $params["data"]["season"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>season_start:</label>
                                    <input
                                        type="text"
                                        name="season_start"
                                        id="season_start"
                                        class="form-control"
                                        value="<?= $params["data"]["season_start"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>season_end:</label>
                                    <input
                                        type="text"
                                        name="season_end"
                                        id="season_end"
                                        class="form-control"
                                        value="<?= $params["data"]["season_end"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>logo:</label>
                                    <input 
                                        type="text"
                                        name="logo"
                                        id="logo"
                                        class="form-control"
                                        value="<?= $params["data"]["logo"]; ?>"
                                    >
                                    <img src="<?= $params["data"]["logo"]; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label>flag:</label>
                                    <input
                                        type="text"
                                        name="flag" 
                                        id="flag"
                                        class="form-control"
                                        value="<?= $params["data"]["flag"]; ?>"
                                    >
                                    <img src="<?= $params["data"]["flag"]; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label>standings:</label>
                                    <input
                                        type="text"
                                        name="standings"
                                        id="standings"
                                        class="form-control"
                                        value="<?= $params["data"]["standings"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>is_current:</label>
                                    <input
                                        type="text"
                                        name="is_current"
                                        id="is_current"
                                        class="form-control"
                                        value="<?= $params["data"]["is_current"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>coverage - standings:</label>
                                    <input
                                        type="text"
                                        name="coverage_standings"
                                        id="coverage_standings"
                                        class="form-control"
                                        value="<?= $params["data"]["coverage_standings"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>coverage - players:</label>
                                    <input
                                        type="text"
                                        name="players"
                                        id="players"
                                        class="form-control"
                                        value="<?= $params["data"]["players"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>coverage - topScorers:</label>
                                    <input
                                        type="text"
                                        name="top_scorers"
                                        id="top_scorers"
                                        class="form-control"
                                        value="<?= $params["data"]["top_scorers"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>coverage - predictions:</label>
                                    <input
                                        type="text"
                                        name="predictions"
                                        id="predictions"
                                        class="form-control"
                                        value="<?= $params["data"]["predictions"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>coverage - odds:</label>
                                    <input
                                        type="text"
                                        name="odds"
                                        id="odds"
                                        class="form-control"
                                        value="<?= $params["data"]["odds"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - events:</label>
                                    <input
                                        type="text"
                                        name="events"
                                        id="events"
                                        class="form-control"
                                        value="<?= $params["data"]["events"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - lineups:</label>
                                    <input
                                        type="text"
                                        name="lineups"
                                        id="lineups"
                                        class="form-control"
                                        value="<?= $params["data"]["lineups"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - statistics:</label>
                                    <input
                                        type="text"
                                        name="statistics"
                                        id="statistics"
                                        class="form-control"
                                        value="<?= $params["data"]["statistics"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>fixtures - players_statistics:</label>
                                    <input
                                        type="text"
                                        name="players_statistics"
                                        id="players_statistics"
                                        class="form-control"
                                        value="<?= $params["data"]["players_statistics"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_league" class="btn btn-primary">Salvar</button>
                                    <a href="/leagues_list" class="btn btn-primary float-end">Voltar</a>
                                </div>
                            </form>
                            <h3>Times</h3>
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
                                        if(isset($params["data"]) && isset($params["data"]["teams"])) {
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
                                            <a href="/team_detail/<?= $time['id']; ?>/<?= $params["data"]["league_id"]; ?>" class="btn btn-info btn-sm">Detalhes</a>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        } else {
                                            echo "<h5> Nenhum dado cadastrado </h5>";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
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
