<?php
require_once "../models/Conexao.class.php";
require_once "../models/tutorial_salvo.class.php";
require_once "../models/tutorial.class.php";

if(!isset($_SESSION))
{
    session_start();
}
    if(isset($_GET['busca']))
    {

        $pesquisa = ($_GET["busca"]);
        
        $tutorial = new Tutorial();
        
        $retorno = $tutorial->Buscar_tutorial($pesquisa);
      
    }
    else
    {
        $tutorial = new Tutorial();
        $retorno = $tutorial->buscar_todos_tutoriais();
    }
    if(isset($_POST['salvar']))
    {
        $salvar = new  Tutorial_salvo(tutorial:$_POST["idtutorial"], usuario:$_SESSION["idusuario"]);
        $salvar->inserir();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="color: white; background: #23272A;">
    <?php
        require_once "menu.php";
    ?>
   
        <!--Posts-->
        <section class='container' style='margin-top:50px'>
            <div class="d-flex justify-content-center mt-6">
                <form class="w-75 m-5"  method="get">
                    <div class="input-group">
                        <input type="text" name="busca" class="form-control" placeholder="O que você procura?">
                        <button class="btn bg-info"><img src="../IMG/busca.png" alt=""></button>
                    </div>
                </form>
            </div>
                <ul>
                    <?php
                        
                        if(is_array($retorno) && count($retorno) > 0){
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
                                        <form  method='POST'>";
                                        if(!isset($_SESSION["idusuario"]))
                                        {
                                            echo "<button type='submit' hidden name='salvar' class = 'btn btn-danger'><img src='../IMG/heart.svg' ></button>";
                                        }
                                        else{
                                            echo "<input type='hidden' name='idtutorial' value='{$dado->idtutorial}' >
                                            <button type='submit' name='salvar' class = 'btn btn-danger'><img src='../IMG/heart.svg' ></button>";
                                        }   
                                echo"</div>
                                </li>
                                
                                ";
                            }
                        }
                        else
                        {
                            echo" <p> Não encontramos nada </p>";
                        }
                    ?>


            </ul>
        </section>
            
</body>
</html>