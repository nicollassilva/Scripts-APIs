<?php
    session_start();

    $image = $_FILES['image'];

    if($image['tmp_name'] != '' && !preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|webp)$/", $image["type"])){

        $_SESSION['error'] = "O sistema só aceita imagens.";
        header("Location: index.php");

    } else {

        if($image['tmp_name'] != '') {

            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image["name"], $ext);

            $imageName = 'upload-'.md5(uniqid(time())) . "." . $ext[1];

            $imagePath = 'uploads/'.$imageName;

            if(move_uploaded_file($image["tmp_name"], $imagePath)) {

                $_SESSION['success'] = "Upload feito com sucesso!";
                header("Location: index.php");

            } else {

                $_SESSION['error'] = "Erro ao fazer upload.";
                header("Location: index.php");

            }

            

        }
    }
?>