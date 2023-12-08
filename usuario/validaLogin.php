<?php
session_start();
include_once ("../confg/conexao.php");


$btloga = filter_input(INPUT_POST, 'btloga', FILTER_SANITIZE_STRING);
if($btloga){
 
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
//echo "$usuario - $senha";
if((!empty($usuario)) AND (!empty($senha))){
  password_hash($senha, PASSWORD_DEFAULT);
  $result_usuario = "SELECT  nome, email, usuario, senha FROM tb_usuario WHERE usuario='$usuario' LIMIT 1 ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if( $resultado_usuario){
      $row_usuario = mysqli_fetch_assoc($resultado_usuario);

      if(password_verify($senha, $row_usuario ['senha'])){
      // $_SESSION['id'] = $row_usuario['id'];
       $_SESSION ['nome'] = $row_usuario ['nome'];
       $_SESSION['email'] = $row_usuario['email'];
       $_SESSION['usuario'] = $row_usuario['usuario'];
        header("Location: ../web/pagPH.php");
      }
      else{
        $_SESSION['msg'] = "Login e senha incorreto";
       header("Location: telalogin.php");
      }
    }
}
else{

  $_SESSION['msg'] = "Página não encontrada";
  header("Location: telalogin.php");
}
}



?>