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
                        <h4>API de Futebol</h4>
                    </div>
                    <div class="card-body">
                        <a href="leagues_list" class="btn btn-primary float-end">Ligas</a>
                        <a href="teams_list" class="btn btn-primary float-end">Times</a>
                        <button
                            type="button"
                            class="open-seedMigrateModal btn btn-danger btn-md"
                            data-toggle="modal"
                            data-target="#seedMigrateModal"
                            name="seed_modal_button"
                            data-action="seed"
                        >
                            Seed
                        </button>
                        <button
                            type="button"
                            class="open-seedMigrateModal btn btn-danger btn-md"
                            data-toggle="modal"
                            data-target="#seedMigrateModal"
                            name="migrate_modal_button"
                            data-action="migrate"
                        >
                            Migrate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seed Modal -->
    <div class="modal fade" id="seedMigrateModal" tabindex="-1" role="dialog" aria-labelledby="seedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="seedModalLabel">Executar Seeder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="seed" class="modal-body d-none">
            Você realmente deseja realmente executar o processo de seed? Dados podem ser apagados ou duplicados, esta ação não pode ser desfeita.
        </div>
        <div id="migrate" class="modal-body d-none">
            Você realmente deseja realmente executar o processo de migration? Todos os dados do banco de dados serão apagados, esta ação não pode ser desfeita.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <div id="seedButton" class="d-none"><a href="?seed=true" class="btn btn-primary float-end">Seed</a></div>
            <div id="migrateButton" class="d-none"><a href="?migrate=true" class="btn btn-primary float-end">Migrate</a></div>
        </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).on("click", ".open-seedMigrateModal", function () {
            var action = $(this).data('action');
            if (action == "seed") {
                $("#seed").removeClass("d-none");
                $("#migrate").addClass("d-none");
                $("#seedButton").removeClass("d-none");
                $("#migrateButton").addClass("d-none");
            } else {
                $("#migrate").removeClass("d-none");
                $("#seed").addClass("d-none");
                $("#migrateButton").removeClass("d-none");
                $("#seedButton").addClass("d-none");
            }
        });
    </script>
</body>
</html>
<?php
