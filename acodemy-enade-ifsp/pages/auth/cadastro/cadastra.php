<?php
include('../../../settings/conexao.php');
include('../../../settings/criptografia.php');

$quantidade = 0;
//Atribuição de valor s variaveis filtrando com função myqsli
$nome = $mysqli->real_escape_string($_POST['nome']);
$email = $mysqli->real_escape_string($_POST['email']);

$substringAdmin = "@professor.ifsp.edu.br";
if(strpos($email, $substringAdmin)!==false){
  $acesso = 1;
}else{
  $acesso = 2;
}
//valida se o campo e senha e comfirmação de senha foram preenchido iguais
if($_POST['senha'] === $_POST['confirmar_senha']){
  $senhas_diferentes = false; // campos são iguais então informa erro
  $senha = criptografando();
  $sql_code = "SELECT * FROM usuarios where email = '$email'";//select email inserido para cadastro no banco de dados 
  $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql: " . $mysqli->error);
  $quantidade = $sql_query-> num_rows;

  if($quantidade == 0 ){
    $sql_code = "INSERT INTO usuarios(id_usuario, email, senha, nome, tipo_acesso) VALUES ('','$email','$senha','$nome','$acesso');";
    $sql_query = $mysqli ->query($sql_code) or die("Falha na execução do código sql: " . $mysqli->error);
    header("location: ../login/login.html");
  }
}
else $senhas_diferentes = true;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Erro ao logar</title>
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
            <h1>Credenciais Inválidas</h1>
            <?php
              if($quantidade!= 0){
                echo "<p>Uma conta ja existe neste email</p>";
              }
              else if($senhas_diferentes == true){
                echo "<p>Senhas diferentes</p>";
              }
            ?>
            <div class="btn-redirect">
                <a href="cadastro.html">Tentar novamente</a>
            </div>
        </div>
    </main>
</body>

</html>