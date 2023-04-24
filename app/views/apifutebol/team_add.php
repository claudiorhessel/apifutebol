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
                            <h4>Time - Criar</h4>
                        </div>
                        <div class="card-body">
                            <form action="team_save" method="POST">
                                <div class="mb-3">
                                    <label>referal_team_id:</label>
                                    <input 
                                        type="number"
                                        name="referal_team_id"
                                        id="referal_team_id"
                                        class="form-control"
                                        value="<?= isset($params["data"]["referal_team_id"])? $params["data"]["referal_team_id"] : null; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>referal_league_id:</label>
                                    <input 
                                        type="number"
                                        name="referal_team_id"
                                        id="referal_team_id"
                                        class="form-control"
                                        value="<?= isset($params["data"]["referal_league_id"])? $params["data"]["referal_league_id"] : null; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>league_id:</label>
                                    <input 
                                        type="number"
                                        name="league_id"
                                        id="league_id"
                                        class="form-control"
                                        value="<?= isset($params["data"]["league_id"])? $params["data"]["league_id"] : null; ?>"
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
                                    <label>code:</label>
                                    <input 
                                        type="text"
                                        maxlength="3"
                                        name="code"
                                        id="code"
                                        class="form-control"
                                        value="<?= isset($params["data"]["code"])? $params["data"]["code"] : null; ?>"
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
                                    <label>is_national:</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="is_national"
                                            id="is_national_true"
                                            value="1"
                                            <?= isset($params["data"]["is_national"]) && $params["data"]["is_national"] == "1" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="is_national_true" >
                                            True
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            name="is_national"
                                            id="is_national_false"
                                            value="0"
                                            required
                                            <?= isset($params["data"]["is_national"]) && $params["data"]["is_national"] == "0" ? "checked" : null; ?>
                                        >
                                        &nbsp;
                                        <label class="form-check-label" for="is_national_false">
                                            False
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>founded:</label>
                                    <input
                                        type="number"
                                        name="founded"
                                        id="founded"
                                        class="form-control"
                                        value="<?= isset($params["data"]["founded"])? $params["data"]["founded"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_name:</label>
                                    <input
                                        type="text"
                                        name="venue_name"
                                        id="venue_name"
                                        class="form-control"
                                        value="<?= isset($params["data"]["venue_name"])? $params["data"]["venue_name"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_surface:</label>
                                    <input
                                        type="text"
                                        name="venue_surface"
                                        id="venue_surface"
                                        class="form-control"
                                        value="<?= isset($params["data"]["venue_surface"])? $params["data"]["venue_surface"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_address:</label>
                                    <input
                                        type="text"
                                        name="venue_address"
                                        id="venue_address"
                                        class="form-control"
                                        value="<?= isset($params["data"]["venue_address"])? $params["data"]["venue_address"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_city:</label>
                                    <input
                                        type="text"
                                        name="venue_city"
                                        id="venue_city"
                                        class="form-control"
                                        value="<?= isset($params["data"]["venue_city"])? $params["data"]["venue_city"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_capacity:</label>
                                    <input
                                        type="number"
                                        name="venue_capacity"
                                        id="venue_capacity"
                                        class="form-control"
                                        value="<?= isset($params["data"]["venue_capacity"])? $params["data"]["venue_capacity"] : null; ?>"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_student" class="btn btn-primary">Salvar</button>
                                    <a href="/teams_list" class="btn btn-primary float-end">Cancelar</a>
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
