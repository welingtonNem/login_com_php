<?php
include("conexao.php");

if(isset($_POST['email'])  || isset($_POST['senha']))
{
    if(strlen($_POST['email']) == 0)
    {
        echo "Preecha seu e-mail";
    }else if(strlen($_POST['senha']) == 0)
    {
        echo "Preecha seu senha";
    }else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na conexao do codico sql: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1)
        {
            $usuari = $sql_query->fetch_assoc();
            // if(isset($_SESSION))
            // {
            //     session_start();
            // }
            // $_SESSION['id'] = $usuari['id'];
            // $_SESSION['nome'] = $usuari['nome'];

            header("location: painel.php");

        }else{
            echo "Falha ao logar E-mail ou senha icorreto";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Acesse sua conta</h1>
    <form method="POST" action="">
        <label for="">Email</label>
        <input type="text" name="email" required><br><br>
        <label for="">Senha</label>
        <input type="password" name="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
    <br>
    <a href="cadastro.php">Cadastro</a>

</body>

</html>