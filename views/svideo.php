<?php
require_once "../models/Conexao.class.php";
require_once "../models/video_salvo.class.php";

if(!isset($_SESSION))
{
    session_start();
}

$id = $_SESSION['idusuario'];
$videos = new Video_salvo();
$retorno=$videos->videos_salvos($id);   

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background: #23272A;">
    <?php
        require_once "menu.php";
    ?>
    <section class="container"  style='margin-top:50px'>
        <div class="row row-cols-3">
            <?php
        
                foreach($retorno as $dado )
                {
                    echo "
                    <a col class= 'link-light link-underline link-underline-opacity-0' href='video.php?idvideo={$dado->idvideo}'>
                        <div>
                            <img class='rounded-4' style=' width: 360px; height: 205px;'  src='../videos/capas/{$dado->capa}'>
                            <h5 class='p-2'>{$dado->titulo} </h5>
                        </div>
                    </a>
                    ";
                }
            
            ?>
        </div>
          
    </section>
</body>
</html>