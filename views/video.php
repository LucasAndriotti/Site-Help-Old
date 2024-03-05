<?php 

require_once "../models/Conexao.class.php";
require_once "../models/videos.class.php";
require_once "../models/video_salvo.class.php";
require_once "../models/comentario.class.php";

if(!isset($_SESSION))
{
    session_start();
}
$msg = array("");


    $vi = $_GET["idvideo"];
    $usu = $_SESSION["idusuario"];
    $video = new Videos();
    $ret = $video->buscar_um_video($vi);
    $ver = new Video_salvo();
    $retor = $ver->verificar_salvo($vi,$usu);
    

if(isset($_POST['salvar']))
{
    $salvar = new  Video_salvo(video: $_GET["idvideo"], usuario:$_SESSION["idusuario"]);
    $salvar->inserir();
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="color: white; background: #23272A;">
    <?php
        require_once "menu.php";
    ?>
    <section class='container' style='margin-top:50px'>
        <?php
            foreach($ret as $dado)
            {
                echo "
                        <video class='ratio ratio-16x9' controls src='../videos/{$dado->video}'></video>
                    
                        <div>
                            <h2>{$dado->titulo}</h2>
                        </div>
                        <div>
                            <form action='#' method='post'>";
                            if(isset($_SESSION["idusuario"]))
                            {
                                
                                if(is_array($retor) && count( $retor) > 0){
                                    echo " <button class='btn btn-success'>Salvo</button>";
                                }
                                else{
                                    echo " <button class='btn btn-primary' name='salvar' type='submit'>Salvar</button>";
                                }
                            }
                                
                               
                                
                        echo "  </form>
                        </div>
                   
                        
                        <div>
                            <h2>Descriçao</h2>
                        </div>
                        <div>
                            <p>
                                {$dado->descricao}
                            </p>
                        </div>
                    ";
            }

        ?>
        <div class='d-flex justify-content-center'>
            <form class='w-50 ' method="post">
                <div  class="input-group">
                    <input type="text" class="form-control" placeholder="Comentario"  name="comentario">
                    <i class='bx bxs-user'></i>
                    <div><?php echo $msg[0];?></div>
                    <?php
                        
                        if(empty($_SESSION["idusuario"]))
                        {
                            echo "<button class='btn btn-outline-primary'><a class='link-light ' href='login.php'>Faça Login</a></button>";
                        }
                        else
                        {
                            echo"<button class='btn btn-outline-success' name='postar' type='submit' >Postar</button>";
                        }
                    
                    ?>
                </div>
            </form>
        </div>
        <ul>
            <?php 
                if(isset($_POST['postar']))
                {
                    
                        $erro = false;
                        if(empty($_POST["comentario"]))
                        {
                            $msg[0] = "Comente Alguma coisa";
                            $erro = true;
                        }
                        if(!$erro)
                        {
                            $comentario =  new Comentario(usuario: $_SESSION["idusuario"],video: $_GET["idvideo"] , texto:$_POST["comentario"]);
                            $comentario->inserir();
                        }
                    

                }
                    $comentarios = new Comentario();
                    $retorno = $comentarios->buscar_comentarios($vi );

                foreach($retorno as $dado )
                {
                    echo"
                    <li class='card m-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$dado->nome} {$dado->sobrenome}</h5>
                            <p>
                                {$dado->texto}
                            </p>   
                        </div>

    
                    </li>
                    
                    ";
                }
            ?>
        </ul>
    </select>
</body>
</html>