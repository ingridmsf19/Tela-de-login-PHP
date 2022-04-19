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

    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se aqui!</strong></a>
        </form>
    </div>
    <?php
        // verificar se clicou no botao
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        //verificar se esta vazio
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("projeto_login", "localhost", "root", "");
            if($u->msgErro == "")
            {
                if($u->logar($email, $senha))
                {
                    header("location: AreaPrivada.php");
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Email e/ou senha estão incorretos!
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
            <?php
        }
    }



    ?>
</body>

</html>