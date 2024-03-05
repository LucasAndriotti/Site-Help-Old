<?php
    	if(!isset($_SESSION))
        {
            session_start();
        }

?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
    <!--Inicio do Menu-->
<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <?php
             if(isset($_SESSION["idusuario"]))
             {
                echo"<a class='navbar-brand' href='perfil.php'>Perfil</a>";
             }
        ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tutoriais.php">Tutoriais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="videos.php">Videos</a>
                    </li>
                    <?php
                        if(!isset($_SESSION["idusuario"]))
                        {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='login.php'>Entrar</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='cadastro.php'>Cadastrar</a>
                            </li>
                            ";
                        }
                        else
                        {
                            if(isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "ADM")
                            {
                                echo "  <li class='nav-item'>
                                            <a class='nav-link' href='criarvideos.php'>Postar Video</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link' href='criartutorial.php'>Postar Tutorial</a>
                                        </li>
                                ";
                            }
                            echo"<li class='nav-item'>
                                    <a class='nav-link' href='logout.php'>Sair</a>
                                </li>";
                        }
                    ?>
                
                </ul>
                
            </div>
    </div>

</nav>
    


           
       
   
   