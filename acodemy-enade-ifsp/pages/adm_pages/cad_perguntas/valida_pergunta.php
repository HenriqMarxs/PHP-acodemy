<?php 
include('../../../settings/conexao.php');
include('../../../settings/protectAdm.php');
// refresh da sessão do usuario,
if(isset($_SESSION)){
    $id = $_SESSION['id'];
    $sql_code = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    $sql_query = $mysqli->query($sql_code);
    $usuario = $sql_query->fetch_assoc();
    $_SESSION['nome'] = $usuario['nome']; 
}
$diciplina = $_POST['knowledge-area'];
$enunciado = $mysqli->real_escape_string($_POST['enunciado_pergunta']);
$opcaoA = $mysqli->real_escape_string($_POST['opcao_a']);
$opcaoB = $mysqli->real_escape_string($_POST['opcao_b']);
$opcaoC = $mysqli->real_escape_string($_POST['opcao_c']);
$opcaoD = $mysqli->real_escape_string($_POST['opcao_d']);
$opcaoE = $mysqli->real_escape_string($_POST['opcao_e']);
$resposta = $_POST['answer'];

$sql_code = "SELECT * FROM pergunta WHERE enunciado_pergunta = '$enunciado';";
$sql_query = $mysqli ->query($sql_code);
$quantidade = $sql_query ->num_rows;
$cadastrada = false;
if($quantidade == 0) {
$id = $_SESSION['id'];
$sql_code = "INSERT INTO pergunta VALUES ('', '$enunciado', '$opcaoA', '$opcaoB', '$opcaoC', '$opcaoD', '$opcaoE', '$resposta', '$diciplina','', '$id')";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql: " . $mysqli->error);
$cadastrada = true;
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
            if($sql_query&&$cadastrada ==true){
                echo "<h1>Cadastro realizado</h1> <p>Sua pergunta foi cadastrada com sucesso</p>";
            }
            else{
                if($quantidade>0){
                    echo "<h1>Erro no cadastro</h1> <p>Pegunta ja cadastrada</p>";
                }
                else{
                    echo "<h1>Erro no cadastro</h1> <p>Ocorreu um erro ao cadastra sua pergunta</p>";
                }
                
            }
            ?>
            <div class= "btn-redirect">
                <a href="cadastrar_perguntas.php">Voltar</a>
            </div>
        </div>
    </main>
</body>