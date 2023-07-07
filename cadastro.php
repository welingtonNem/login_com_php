<?php
include('conexao.php');
$erro = 0;
if (count($_POST) > 0) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // $senha_insegura = filter_input(INPUT_POST, $_POST['senha'], FILTER_DEFAULT);
    // $senha_segura = password_hash($senha_insegura, PASSWORD_DEFAULT);

    if (empty($email)) {
        $erro = "Prencha capo do email";
    } else if (empty($senha)) {
        $erro = "Prencha capo do email";
    } else if ($erro) {
        echo "<p><b>Erro: $erro </b></p>";
    }else{

        $sql = "INSERT INTO usuario(email,senha) VALUES('$email','$senha')";

        if ($mysqli->query($sql) === TRUE) {
            echo "<p>Arquivo eviado com sucesso!";
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
    <form method="POST" action="">
        <label for="">Email</label>
        <input type="text" name="email" required><br><br>
        <label for="">Senha</label>
        <input type="password" name="senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form><br><br>

    <a href="index.php">Login</a>

</body>

</html>