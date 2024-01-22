<?php
function criptografando(){
  include('conexao.php');
  if(isset($_POST['senha'])){
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $cripografia = base64_encode($senha);
    return $cripografia;
    
  }
}
function criptogrfaNovaSenha(){
  if(isset($_POST['senha_nova'])){
    include('conexao.php');
    $senha = $mysqli->real_escape_string($_POST['senha_nova']);
    $cripografia = base64_encode($senha);
    return $cripografia;
  }
}
?>