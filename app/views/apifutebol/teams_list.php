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
                            <h4>Times
                            <a href="team_add" class="btn btn-primary float-end">Add</a>
                            <a href="leagues_list" class="btn btn-primary float-end">Ligas</a>
                            <a href="/" class="btn btn-primary float-end">Voltar</a>
                            </h4>
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
                        <div class="card mb-2">
                            <div class="container mt-2 pb-2">
                                <form id="filter_teams_form" name="filter_teams_form" class="row g-3" method="GET" action="teams_list">
                                    <div class="col-md-4">
                                        <label for="referal_team_id" class="form-label">referal_team_id:</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="referal_team_id"
                                            name="referal_team_id"
                                            value="<?= isset($params["search"]["referal_team_id"])? $params["search"]["referal_team_id"] : null; ?>"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">name:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="<?= isset($params["search"]["name"])? $params["search"]["name"] : null; ?>"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="founded" class="form-label">founded:</label>
                                        <input
                                            type="number"
                                            maxlength="4"
                                            class="form-control"
                                            id="founded"
                                            name="founded"
                                            value="<?= isset($params["search"]["founded"])? $params["search"]["founded"] : null; ?>"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="referal_league_id" class="form-label">referal_league_id:</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="referal_league_id"
                                            name="referal_league_id"
                                            value="<?= isset($params["search"]["referal_league_id"])? $params["search"]["referal_league_id"] : null; ?>"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="code" class="form-label">code:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="code"
                                            name="code"
                                            value="<?= isset($params["search"]["code"])? $params["search"]["code"] : null; ?>"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="venue_name" class="form-label">venue_name:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="venue_name"
                                            name="venue_name"
                                            value="<?= isset($params["search"]["venue_name"])? $params["search"]["venue_name"] : null; ?>"
                                        >
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <button type="submit" class="btn btn-info">Pesquisar</button>
                                        <a href="teams_list" class="btn btn-info btn-md">Limpar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>referal_team_id</th>
                                        <th>referal_league_id</th>
                                        <th>name</th>
                                        <th>code</th>
                                        <th>founded</th>
                                        <th>venue_name</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($params["data"])) {
                                            foreach($params["data"] as $time) {
                                    ?>
                                    <tr>
                                        <td><?= $time['referal_team_id']; ?></td>
                                        <td><?= $time['referal_league_id']; ?></td>
                                        <td><?= $time['name']; ?></td>
                                        <td><?= $time['code']; ?></td>
                                        <td><?= $time['founded']; ?></td>
                                        <td><?= $time['venue_name']; ?></td>
                                        <td>
                                            <a href="team_detail/<?= $time['id']; ?>" class="btn btn-info btn-sm">Detalhes</a>
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-sm open-team_modal"
                                                data-toggle="modal"
                                                data-target="#teamModal"
                                                data-team_id="<?= $time['id']; ?>"
                                                name="delete_modal_button"
                                            >
                                                Deletar
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="teamModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="teamModalLabel">Confirma deletar time?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Você relamente deseja deletar este time?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <form id="modelteamForm" method="POST" class="d-inline" name="modalForm">
                                                    <button type="submit" class="btn btn-danger">Confirmar Deletar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(document).on("click", ".open-team_modal", function () {
            var teamId = $(this).data('team_id');
            var action = "team_delete/" + teamId;
            $('#modelteamForm').attr('action', action);
        });
    </script>
</body>
</html>
<?php
