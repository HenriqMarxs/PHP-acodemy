<?php
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['id']) ||$_SESSION['acesso']!=1){
  isset($_SESSION);
  session_destroy();
  header("Location: ../../auth/login/login.html");
}
?>