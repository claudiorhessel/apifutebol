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
                        <div class="card-body">
                            <form action="code.php" method="POST">
                                <div class="mb-3">
                                    <label>referal_team_id:</label>
                                    <input 
                                        type="text"
                                        name="referal_team_id"
                                        id="referal_team_id"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["referal_team_id"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>referal_league_id:</label>
                                    <input 
                                        type="text"
                                        name="referal_league_id"
                                        id="referal_league_id"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["referal_league_id"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>league_id:</label>
                                    <input 
                                        type="text"
                                        name="league_id"
                                        id="league_id"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["league_id"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>name:</label>
                                    <input
                                        type="email"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["name"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>code:</label>
                                    <input 
                                        type="text"
                                        name="code"
                                        id="code"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["code"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>logo:</label>
                                    <input
                                        type="text"
                                        name="logo"
                                        id="logo"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["logo"]; ?>"
                                    >
                                    <img src="<?= $params["data"]["0"]["logo"]; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label>country:</label>
                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["country"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>is_national:</label>
                                    <input
                                        type="email"
                                        name="is_national"
                                        id="is_national"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["is_national"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>founded:</label>
                                    <input
                                        type="text"
                                        name="founded"
                                        id="founded"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["founded"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_name:</label>
                                    <input
                                        type="text"
                                        name="venue_name"
                                        id="venue_name"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["venue_name"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_surface:</label>
                                    <input
                                        type="text"
                                        name="venue_surface"
                                        id="venue_surface"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["venue_surface"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_address:</label>
                                    <input
                                        type="email"
                                        name="venue_address"
                                        id="venue_address"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["venue_address"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_city:</label>
                                    <input
                                        type="text"
                                        name="venue_city"
                                        id="venue_city"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["venue_city"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label>venue_capacity:</label>
                                    <input
                                        type="text"
                                        name="venue_capacity"
                                        id="venue_capacity"
                                        class="form-control"
                                        value="<?= $params["data"]["0"]["venue_capacity"]; ?>"
                                    >
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_student" class="btn btn-primary">Salvar</button>
                                    <?php
                                        if ($params["league_id"]) {
                                    ?>
                                    <a href="/league_detail/<?= $params["league_id"]; ?>" class="btn btn-primary float-end">Voltar</a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="/teams_list" class="btn btn-primary float-end">Voltar</a>
                                    <?php
                                        }
                                    ?>
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
