<?php 
include('../../../settings/conexao.php');
include('../../../settings/protectAdm.php');
include('../../../settings/criptografia.php');
// refresh da sessão do usuario,
$verificaEmail= 0;
if(isset($_SESSION)){
    $id = $_SESSION['id'];
    $sql_code = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    $sql_query = $mysqli->query($sql_code);
    $usuario = $sql_query->fetch_assoc();
    $_SESSION['nome'] = $usuario['nome']; 
}
$novoNome = $mysqli->real_escape_string($_POST['nome_usuario']);
$novoEmail = $mysqli->real_escape_string($_POST['email']);
$senhaAtual = criptografando();
if(strlen($_POST['senha_nova'])>0){
    $novaSenha = criptogrfaNovaSenha();
}else{
    $novaSenha = $senhaAtual;
}
$id = $_SESSION['id'];

$sql_code = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
$sql_query = $mysqli ->query($sql_code);
$verificaSenha = $sql_query-> fetch_assoc();

if(strlen($novoEmail)== 0){
    $novoEmail = $verificaSenha['email'];
    
}else{
    $sql_code = "SELECT * FROM usuarios WHERE email = '$novoEmail'";
    $sql_query = $mysqli ->query($sql_code);
    $verificaEmail = $sql_query-> num_rows;
    $senhaIncorreta = false;

}


if($verificaSenha['senha'] == $senhaAtual){
    
    $sql_code = "UPDATE usuarios SET email = '$novoEmail', senha = '$novaSenha', nome = '$novoNome' where id_usuario = '$id'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql: " . $mysqli->error);
}
else{
    $senhaIncorreta = true;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../auth/login/style.css ">
    <title>Document</title>
</head>

<body>

    <a href="../../../index.html">
        <div class="logotipo">
            <p>a
            <div class="code">code</div>my</p>
        </div>
    </a>

    <main>
        <div class="container-main">
            <?php
            if($senhaIncorreta == false && $verificaEmail==0){
                echo "<h1>Informações alteradas</h1>
                    <p>Seus dados foram alterados com sucesso</p>";
            }else if($verificaEmail>1){
                echo "<h1>Informações não alteradas</h1>
                <p>Ja possui uma conta cadastrada neste email</p>";
            }
            else {
                echo "<h1>Informações não alteradas</h1>
                    <p>Senha atual esta incorreta</p>";
            }
            ?>
            <div class= "btn-redirect">
                <a href="index.php">Voltar</a>
            </div>
        </div>
    </main>
</body>