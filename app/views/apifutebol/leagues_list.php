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
                    <div class="card-body">

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
                                    if($params["status"])
                                    {
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
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$ligas['id'];?>" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
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
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
