<?php
require_once "../models/Conexao.class.php";
require_once "../models/tutorial_salvo.class.php";
if(!isset($_SESSION))
{
    session_start();
}


$id = $_SESSION['idusuario'];
$videos = new Tutorial_salvo();
$retorno=$videos->tutoriais_salvos($id);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriais salvos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
</head>
<body style="color: white; background: #23272A;">
    <?php
        require_once "menu.php";
    ?>
    <!-- Tutoriais salvos -->
    <div class = 'container' style='margin-top:100px'>
        <ul>
            <?php
                foreach($retorno as $dado )
                {
                    echo "  
                            <li class='card m-3'>
                            <div class='card-body'>
                                <h4 class='card-title'>{$dado->titulo}</h4>
                            </div>
                            <p class='m-2'>
                                {$dado->texto}
                            </p>
                    
                            <div class='m-2'>
                                <button class = 'btn btn-danger'><img src='../IMG/heart.svg' ></button>
                            </div>
                        </li>
                                
                     ";
                            
                }
            ?>
        
        </ul>
    </div>
</body>
</html>