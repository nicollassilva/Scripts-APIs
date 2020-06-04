<?php

    require "class/Functions.class.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bbcode.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bbcode.js"></script>
    <title>BBCode API by Nícollas Silva</title>
</head>
<body>
    <div class="container">
        <div class="form-group mt-5">
            <form action="view.php" method="post">
                <textarea class="form-control" name="text" id="text" placeholder="Digite com bbcode e teste a api"></textarea>
                <div class="bbcode"><?= $Functions->BBCode('#text', 2) ?></div>
                <button type="submit" class="btn btn-sm btn-primary mt-2">Testar</button>
            </form>
        </div>
    </div>
</body>
</html>