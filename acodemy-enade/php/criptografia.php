<?php
function criptografando(){
  
  include('conexao.php');
  $senha = $mysqli->real_escape_string($_POST['senha']);
  $cripografia = base64_encode($senha);
  return $cripografia;
}

?>