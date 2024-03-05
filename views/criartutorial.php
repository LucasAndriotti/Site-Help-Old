<?php
require_once "../models/Conexao.class.php";
require_once "../models/tutorial.class.php";

$msg = array("","");
    if($_POST)
    {
        $erro = false;
        if(empty($_POST["titulo"]))
        {
            $msg[0] = "Preencha o Titulo";
            $erro = true;
        }
        if(empty($_POST["texto"]))
        {
            $msg[1] = "Preencha o Texto";
            $erro = true;
        }
        if(!$erro)
        {
            $tutorial = new Tutorial(titulo:$_POST['titulo'],texto:$_POST['texto']);
            $tutorial->inserir();
        }

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
    <!--Inicio do Menu-->
    <?php
        require_once "menu.php";
    ?>
    <!--Fim do Menu-->
    
    <section class="container"  style='margin-top:100px'>
        <!-- Novo Post -->
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50" >
                <div class="m-3">
                    <label>Titulo</label>
                    <input type="text" class="form-control"  name="titulo" placeholder="Digite o Titulo">
                </div>
                <div class="m-3">
                    <label for="">Conteudo</label>
                    <textarea name="texto" class="form-control"  placeholder="O que deseja colocar?"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
            </form>
        </div>

</section>

</body>
</html>