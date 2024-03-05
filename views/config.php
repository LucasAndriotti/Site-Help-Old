<?php
require_once "../models/Conexao.class.php";
require_once "../models/Usuario.class.php";

$usuario = new Usuario($_GET["idusuario"]);
$ret = $usuario->buscar_um_usuario();
if($_POST)
{
    
    $usuario = new Usuario($_POST["idusuario"], $_POST["nome"], $_POST["sobrenome"], $_POST["email"], md5($_POST["senha"]));	
    $usuario->alterar();
    
    header("location:perfil.php");
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="color: white ;background: #23272A;">
    <?php
        require_once "menu.php";
    ?>
    
    <section class='container' style='margin-top:100px'>
        <div class="d-flex justify-content-center">
            <form action="" method="POST">
                <h1>Configurações</h1>
                <input type="hidden" name="idusuario" value="<?php echo $ret[0]->idusuario;?>" >
                <div class="input-box m-2">
                    <label>Alterar Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Alterar nome" required  value="<?php echo $ret[0]->nome;?>">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box m-2">
                    <label>Alterar Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" placeholder="Alterar Sobrenome" required  value="<?php echo $ret[0]->sobrenome;?>">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box m-2">
                    <label>Alterar Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Alterar email" required  value="<?php echo $ret[0]->email;?>">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box m-2">
                    <label>Alterar Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Alterar senha" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="d-flex justify-content-center ">
                    <button type="submit" class="btn btn-light m-2" >Salvar Configurações</a></button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>