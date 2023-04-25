<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futebol</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>  
    <div class="container-xxl mt-5">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ligas
                            <a href="league_add" class="btn btn-primary float-end">Add</a>
                            <a href="teams_list" class="btn btn-primary float-end">Times</a>
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
                            <form id="filter_leagues_form" name="filter_leagues_form" class="row g-3" method="GET" action="leagues_list">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">name:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        value="<?= isset($params["search"]["name"])? $params["search"]["name"] : null; ?>"
                                    >
                                </div>
                                <div class="col-md-6">
                                    <label for="season" class="form-label">season:</label>
                                    <input
                                        type="number"
                                        maxlength="4"
                                        class="form-control"
                                        id="season"
                                        name="season"
                                        value="<?= isset($params["search"]["season"])? $params["search"]["season"] : null; ?>"
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
                                    <label for="season_start" class="form-label">season_start:</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="season_start"
                                        name="season_start"
                                        value="<?= isset($params["search"]["season_start"])? $params["search"]["season_start"] : null; ?>"
                                    >
                                </div>
                                <div class="col-md-4">
                                    <label for="season_end" class="form-label">season_end:</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="season_end"
                                        name="season_end"
                                        value="<?= isset($params["search"]["season_end"])? $params["search"]["season_end"] : null; ?>"
                                    >
                                </div>
                                <div class="col-md-6 mt-2">
                                    <button type="submit" class="btn btn-info">Pesquisar</button>
                                    <a href="leagues_list" class="btn btn-info btn-md">Limpar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php 
                            if($params["status"])
                            {
                        ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>referal_league_id</th>
                                    <th>name</th>
                                    <th>country</th>
                                    <th>code</th>
                                    <th>season</th>
                                    <th>season_start</th>
                                    <th>season_end</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($params['data'] as $ligas)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $ligas['referal_league_id']; ?></td>
                                            <td><?= $ligas['name']; ?></td>
                                            <td><?= $ligas['country']; ?></td>
                                            <td><?= $ligas['country_code']; ?></td>
                                            <td><?= $ligas['season']; ?></td>
                                            <td><?= $ligas['season_start']; ?></td>
                                            <td><?= $ligas['season_end']; ?></td>
                                            <td>
                                                <a href="league_detail/<?= $ligas['id']; ?>" class="btn btn-info btn-sm">Detalhes</a>
                                                <button
                                                    type="button"
                                                    class="btn btn-danger btn-sm open-league_modal"
                                                    data-toggle="modal"
                                                    data-target="#leagueModal"
                                                    data-league_id="<?= $ligas['id']; ?>"
                                                    name="delete_modal_button"
                                                >
                                                    Deletar
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php
                            }
                            else
                            {
                                echo "<h5> Nenhum dado cadastrado </h5>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="leagueModal" tabindex="-1" role="dialog" aria-labelledby="leagueModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leagueModalLabel">Confirma deletar liga?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Você relamente deseja deletar esta liga?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="modelLeagueForm" method="POST" class="d-inline" name="modalForm">
                    <button type="submit" class="btn btn-danger">Confirmar Deletar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).on("click", ".open-league_modal", function () {
            var leagueId = $(this).data('league_id');
            var action = "league_delete/" + leagueId;
            $('#modelLeagueForm').attr('action', action);
        });
    </script>
</body>
</html>
<?php
