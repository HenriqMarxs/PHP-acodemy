<?php
include('conexao.php');
include('criptografia.php');

if (isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) != 0 && strlen($_POST['senha'] != 0)){
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = criptografando();
        $sql_code = "SELECT * FROM usuarios where email = '$email' and senha = '$senha'";   
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql: " . $mysqli->erro);
        
        $quantidade = $sql_query-> num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id']= $usuario['id_usuario'];
            $_SESSION['nome']= $usuario['nome'];
            header("Location: ../html/home_adm.php");
        }
    } 
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
    <title>Document</title>
</head>
<body>
    
    <a href="../index.html">
        <div class="logotipo">
            <p>a
            <div class="code">code</div>my</p>
        </div>
    </a>

    <main>
        <div class="container-main">
            <h1>Credenciais Inválidas</h1>
            <?php
            if(strlen($_POST['email']) == 0){
                echo "<p>Preencha seu email</p>";

            }else if(strlen($_POST['senha']) == 0){
                echo "<p?>Preencha sua senha</p>";

            }else echo "<p>Email ou senha incorretos</p>";

            ?>
            
            <div class="btn-redirect">
                <a href="../html/login.html">Tentar novamente</a>
            </div>
        </div>
    </main>
</body>
</html>

