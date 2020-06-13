<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações com PHP&Jquery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/default.css">
</head>
<body>
    <div class="box-alerts">
        <button class="btn btn-success" type="button">Sucesso</button>
        <button class="btn btn-warning" type="button">Alerta</button>
        <button class="btn btn-danger" type="button">Erro</button>
        <button class="btn btn-primary" type="button">Primary</button>
        <a href=""><button class="btn btn-dark" type="button" style="margin-top: 30px">Github</button></a>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/alert.js"></script>
    <script>
        $('.btn-success').click(function() { Alert.setAlert('topLeft', 'success', 'Exemplo de alerta 1', 3000) })
        $('.btn-warning').click(function() { Alert.setAlert('topRight', 'warning', 'Exemplo de alerta 2', 3000) })
        $('.btn-danger').click(function() { Alert.setAlert('bottomLeft', 'danger', 'Exemplo de alerta 3', 3000) })
        $('.btn-primary').click(function() { Alert.setAlert('bottomRight', 'primary', 'Exemplo de alerta 4', 3000) })
    </script>
</body>
</html>