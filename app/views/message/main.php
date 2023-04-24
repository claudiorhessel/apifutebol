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
    <div class="max-width center-screen bg-white padding">
        <div class="card border-danger mb-3">
            <div class="card-header"><?=$params["title"];?></div>
            <div class="card-body">
                <p class="card-text"><?=$params["message"]?></p>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
