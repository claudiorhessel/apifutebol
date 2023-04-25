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
                            <h4>Time - Detalhe</h4>
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
                            <form action="/team_update/<?= $params["data"]["id"]; ?>" method="POST">
                                <input 
                                    type="hidden"
                                    name="team_id"
                                    id="team_id"
                                    class="form-control"
                                    value="<?= $params["data"]["id"]; ?>"
                                >
                                <div class="mb-3">
                                    <label>referal_team_id:</label>
                                    <input 
                                        type="number"
                                        name="referal_team_id"
                                        id="referal_team_id"
                                        class="form-control <?= isset($params['validations']['referal_team_id'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["referal_team_id"])? $params["data"]["referal_team_id"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['referal_team_id'])) {
                                        foreach($params['validations']['referal_team_id'] as $value) {
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
                                    <label>referal_league_id:</label>
                                    <input 
                                        type="number"
                                        name="referal_league_id"
                                        id="referal_league_id"
                                        class="form-control <?= isset($params['validations']['referal_league_id'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["referal_league_id"])? $params["data"]["referal_league_id"] : null; ?>"
                                        required
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
                                    <label>league_id:</label>
                                    <input 
                                        type="number"
                                        name="league_id"
                                        id="league_id"
                                        class="form-control <?= isset($params['validations']['league_id'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["league_id"])? $params["data"]["league_id"] : null; ?>"
                                    >
                                    <?php
                                    if (isset($params['validations']['league_id'])) {
                                        foreach($params['validations']['league_id'] as $value) {
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
                                        required
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
                                    <label>code:</label>
                                    <input 
                                        type="text"
                                        maxlength="3"
                                        name="code"
                                        id="code"
                                        class="form-control <?= isset($params['validations']['code'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["code"])? $params["data"]["code"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['code'])) {
                                        foreach($params['validations']['code'] as $value) {
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
                                        required
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
                                    <label>country:</label>
                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        class="form-control <?= isset($params['validations']['country'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["country"])? $params["data"]["country"] : null; ?>"
                                        required
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
                                    <div class="form-group">
                                        <div class="<?= isset($params['validations']['is_national'])? 'is-invalid form-control' : ''; ?>">
                                            <label for="is_national_true" class="form-label">is_national:</label>
                                            <br />
                                            <div class="form-check form-check-inline">
                                                <input
                                                    type="radio"
                                                    name="is_national"
                                                    id="is_national_true"
                                                    value="1"
                                                    class="form-check-input"
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
                                                    class="form-check-input"
                                                    <?= isset($params["data"]["is_national"]) && $params["data"]["is_national"] == "0" ? "checked" : null; ?>
                                                >
                                                &nbsp;
                                                <label class="form-check-label" for="is_national_false">
                                                    False
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($params['validations']['is_national'])) {
                                            foreach($params['validations']['is_national'] as $value) {
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
                                    <label>founded:</label>
                                    <input
                                        type="number"
                                        name="founded"
                                        id="founded"
                                        class="form-control <?= isset($params['validations']['founded'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["founded"])? $params["data"]["founded"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['founded'])) {
                                        foreach($params['validations']['founded'] as $value) {
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
                                    <label>venue_name:</label>
                                    <input
                                        type="text"
                                        name="venue_name"
                                        id="venue_name"
                                        class="form-control <?= isset($params['validations']['venue_name'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["venue_name"])? $params["data"]["venue_name"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['venue_name'])) {
                                        foreach($params['validations']['venue_name'] as $value) {
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
                                    <label>venue_surface:</label>
                                    <input
                                        type="text"
                                        name="venue_surface"
                                        id="venue_surface"
                                        class="form-control <?= isset($params['validations']['venue_surface'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["venue_surface"])? $params["data"]["venue_surface"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['venue_surface'])) {
                                        foreach($params['validations']['venue_surface'] as $value) {
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
                                    <label>venue_address:</label>
                                    <input
                                        type="text"
                                        name="venue_address"
                                        id="venue_address"
                                        class="form-control <?= isset($params['validations']['venue_address'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["venue_address"])? $params["data"]["venue_address"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['venue_address'])) {
                                        foreach($params['validations']['venue_address'] as $value) {
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
                                    <label>venue_city:</label>
                                    <input
                                        type="text"
                                        name="venue_city"
                                        id="venue_city"
                                        class="form-control <?= isset($params['validations']['venue_city'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["venue_city"])? $params["data"]["venue_city"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['venue_city'])) {
                                        foreach($params['validations']['venue_city'] as $value) {
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
                                    <label>venue_capacity:</label>
                                    <input
                                        type="number"
                                        name="venue_capacity"
                                        id="venue_capacity"
                                        class="form-control <?= isset($params['validations']['venue_capacity'])? 'is-invalid' : ''; ?>"
                                        value="<?= isset($params["data"]["venue_capacity"])? $params["data"]["venue_capacity"] : null; ?>"
                                        required
                                    >
                                    <?php
                                    if (isset($params['validations']['venue_capacity'])) {
                                        foreach($params['validations']['venue_capacity'] as $value) {
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
