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
                        <div class="card-body">
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
                                        if(isset($params["data"])) {
                                            foreach($params["data"] as $time) {
                                    ?>
                                    <tr>
                                        <td><?= $time['referal_team_id']; ?></td>
                                        <td><?= $time['name']; ?></td>
                                        <td><?= $time['code']; ?></td>
                                        <td><?= $time['country']; ?></td>
                                        <td><?= $time['founded']; ?></td>
                                        <td><?= $time['venue_name']; ?></td>
                                        <td>
                                            <a href="team_detail/<?= $time['id']; ?>" class="btn btn-info btn-sm">Detalhes</a>
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
