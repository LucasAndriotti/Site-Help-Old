<?php
require_once "../models/Conexao.class.php";
require_once "../models/videos.class.php";

    if(isset($_GET['busca']))
    {

        $pesquisa = ($_GET["busca"]);
        
        $video = new Videos();
        
        $retorno = $video->Buscar_video($pesquisa);
      
    }
    else
    {
        $videos = new Videos();
        $retorno = $videos->buscar_todos_videos();
    }

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
        <div class="d-flex justify-content-center">
            <form class="w-75 m-5"  method="get">
                <div class="input-group">
                    <input type="text" name="busca" class="form-control" placeholder="O que você procura?">
                    <button class="btn bg-info"><img src="../IMG/busca.png" alt=""></button>
                </div>
            </form>
        </div>
        <div class="row row-cols-3">
            <?php
            
            if(is_array($retorno) && count($retorno) > 0){
                foreach($retorno as $dado )
                {
                    echo "
                    <a class=' col link-light link-underline link-underline-opacity-0' href='video.php?idvideo={$dado->idvideo}'>
                        <div>
                            <img class='rounded-4' style=' width: 360px; height: 205px;'  src='../videos/capas/{$dado->capa}'>
                            <h5 class='p-2'>{$dado->titulo} </h5>
                        </div>
                    </a>
                    ";
                }
        
            }
            else
            {
                echo" <p style='color: white;'> Não encontramos nada </p>";
            }
            
            ?>
        </div>
          
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>