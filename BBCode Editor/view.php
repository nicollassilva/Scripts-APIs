<?php

    require "class/Functions.class.php";
    $text = nl2br($_POST['text']);
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
        <a href="index.php"><button class="btn btn-dark btn-sm mt-2">Voltar/Back</button></a>
       <div class="view">
            <?= $Functions->ViewBB($text, 2) ?>
       </div>
    </div>
</body>
</html>