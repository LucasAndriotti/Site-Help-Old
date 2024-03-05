<?php
    	if(!isset($_SESSION))
        {
            session_start();
        }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../CSS/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="corpoPerfil">
    <!--Inicio do Menu-->
    <?php
        require_once "menu.php";
    ?>

    <!-- Perfil -->
    <main class="perfilMain"  style='margin-top:50px'>
        <?php
        require_once "../models/Conexao.class.php";
        require_once "../models/Usuario.class.php";

                echo "
                
                <div>
                <img src= '../IMG/{$_SESSION['foto']}'  alt='Minha foto' class='fotoUsuario'>
                <h1>{$_SESSION['nome']}</h1>
                <p>Bem vindo, aqui você poderá ver configurar seu perfil e ver seus videos e tutoriais salvos</p>
                </div>
                <br>
                
                ";
        ?>
    
        <div>
            <section class="sectionPerfil">
                <?php 
                echo"
                    <a href='config.php?idusuario={$_SESSION['idusuario']}'  target='__blank__' class='perfilLinks'>
                    Configurações
                    <img src='../IMG/gear.png' class='configImg'>
                    </a>
                    </section>
                <br>";
            ?> 
            <section class="sectionPerfil">
                <a href="svideo.php"   target="__blank__" class="perfilLinks">
                    Assistir mais tarde
                    <img src="../IMG/later.png" alt="" class="configImg">
                </a>
            </section>

            <br>

            <section class="sectionPerfil">
                <a href="tutoriaissalvos.php?" target="__blank__" class="perfilLinks">
                    Tutoriais salvos
                    <img src="../IMG/favorito.png" alt="" class="configImg">
                </a>
            </section>
        </div>

        <br>

        <div>
            <hr>
            <footer>
                <p>Developed by <a class="linkFooter">Lucas Andriotti</a>. © 2021 All Rights Reserved.</p>
            </footer>
        </div>
    </main>
</body>