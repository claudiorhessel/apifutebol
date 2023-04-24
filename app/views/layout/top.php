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
    < class="container-xxl mt-5">
        <?php 
            require($_SERVER['DOCUMENT_ROOT'] . "/../app/controllers/futebol/FutebolController.class.php");
            $futebol = new FutebolController;
        ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ligas
                            <a href="student-create.php" class="btn btn-primary float-end">Adicionar Liga</a>
                        </h4>
                    </div>
                    <div class="card-body">
