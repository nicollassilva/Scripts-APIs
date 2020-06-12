<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload com PHP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container justify-content-center">
    <?php
        if(isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
            </div>
        <?php
        } else if(isset($_SESSION['success'])) { ?>
            <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
            </div>
            <?php
        }
        session_destroy();
    ?>
        <form method="post" action="Upload.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
                    <label for="file">Envie sua imagem</label>
                    <input id="file" class="form-control-file" type="file" name="image" accept="image/*">
                </div>
                <div class="btn-group" role="group" aria-label="Button submit">
                    <button class="btn btn-success btn-sm" type="submit">Enviar</button>
                </div>
            </div>  
        </form>
    </div>
</body>
</html>