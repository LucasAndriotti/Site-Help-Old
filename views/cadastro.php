<?php 
require_once "../models/Conexao.class.php";
require_once "../models/Usuario.class.php";

$msg = array("","","","","");
    if($_POST)
    {
        $erro = false;
        if(empty($_POST["nome"]))
        {
            $msg[0] = "Preencha o Nome";
            $erro = true;
        }
        if(empty($_POST["sobrenome"]))
        {
            $msg[1] = "Preencha o Sobrenome";
            $erro = true;
        }
        if(empty($_POST["email"]))
        {
            $msg[2] = "Preencha a email";
            $erro = true;
        }
        if(empty($_POST["senha"]))
        {
            $msg[3] = "Preencha a senha";
            $erro = true;
        }
        if($_POST["email"] != ""){
            $usuario = new Usuario(email:$_POST["email"]);
            $retorno=$usuario->verifiacar_email();
            if(is_array($retorno) && count($retorno)>0){
                $msg[2]="E-mail Ja cadastrado";
                $erro = true;
            }
        }

        if(!$erro)
        {   
            $usuario = new Usuario(nome:$_POST['nome'],sobrenome:$_POST['sobrenome'], email:$_POST['email'], senha:md5($_POST["senha"]), tipo:"Cliente", foto:"profile.png");
            $usuario->inserir();
         
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    <div class="wrapper">
        <form action="#" method ="POST">
            <h1>Cadastrar-se</h1>
            <div class="input-box">
                <input type="text" placeholder="Nome" name="nome" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Sobrenome" name="sobrenome" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Senha" name="senha" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <button type="submit" class="btn">Criar conta</a></button>

            <div class="register-link">
                <p>Já possui conta? <a href="login.php">Entrar</a></p>
            </div>
        </form>
    </div>
</body>
</html>