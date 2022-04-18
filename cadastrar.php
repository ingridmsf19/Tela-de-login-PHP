<?php
    require_once './classes/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div id="corpo-form-cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <?php
    // verificar se clicou no botao
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
        //verificar se esta vazio
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
        {
            $u->conectar("projeto_login", "localhost", "root", "");
            if($u->msgErro == "") //se esta tudo ok
            {
                if($senha == $confirmarSenha)
                {

                   if($u->cadastrar($nome, $telefone, $email, $senha))
                   {
                        echo "Cadastrado com sucesso! Acesse para entrar!";
                   }
                   else
                   {
                        echo "Email já cadastrado!";
                   }
                }
                else
                {
                    echo "Senha e confirmar senha não correspondem!";
                }
            }
            else
            {
                echo "Erro: ".$u->msgErro;
            }
        }
        else 
        {
            echo "Preencha todos os campos!";
        }
    }


    ?>

</body>

</html>