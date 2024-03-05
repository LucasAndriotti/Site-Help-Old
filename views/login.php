<?php 
require_once "../models/Conexao.class.php";
require_once "../models/Usuario.class.php";

$msg = array("","");

    if($_POST)
    {
        $erro = false;
        if(empty($_POST["email"]))
        {
            $msg[0] = "Preencha o e-mail";
            $erro = true;
        }
        if(empty($_POST["senha"]))
        {
            $msg[1] = "Preencha a senha";
            $erro = true;
        }

        if(!$erro)
        {
            $usuario = new Usuario(email:$_POST["email"], senha:md5($_POST["senha"]));
            $retorno = $usuario->verificar_usuario();

            if(is_array($retorno) && count($retorno) > 0)
			{
				//encontrou o usuário no bd
				if(!isset($_SESSION))
				{
					session_start();
				}
				$_SESSION["idusuario"] = $retorno[0]->idusuario;
				$_SESSION["nome"] = $retorno[0]->nome;
                $_SESSION["foto"] = $retorno[0]->foto;
				$_SESSION["tipo"] = $retorno[0]->tipo;
				header("location:home.php");
				die();
			}
			else
			{
				//não encontrou o usuário no bd
				$msg[0] = "E-mail/Senha não conferem";
			}

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    <div class="wrapper">
        <form action="#" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Usuário" name="email" >
                <i class='bx bxs-user'></i>
                <div><?php echo $msg[0];?></div>
            </div>
            
            <div class="input-box">
                <input type="password" placeholder="Senha" name="senha">
                <i class='bx bxs-lock-alt' ></i>
                <div><?php echo $msg[1];?></div>
            </div>
            
            <button type="submit" class="btn">Entrar</button>

            <div class="register-link">
                <p>Não possui uma conta? <a href="cadas">Registrar-se</a></p>
            </div>
        </form>
    </div>
</body>
</html>