<?php 
 
 /*$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 
  if(!empty($dados['entrar'])){ 
   //var_dump($dados);
   $query_email = "SELECT id_email, email, senha_us /*selecionar dados da tabela
   FROM tb_usuario usar tabela (tal)
   WHERE email =:email  escolher colucar e valor 
   LIMIT 1";
  $result_email = $conn->prepare($query_email);
  $result_email->bindParam(':email',$dados['email'], PDO::PARAM_STR);
  $result_email->execute();
 
 if(($result_email) AND ($result_email->rowCount() !=0)){
  $row_email = $result_email->fetch(PDO::FETCH_ASSOC);
   //var_dump($row_email);
 
   if(password_verify($dados['senha_us'],$row_email['senha_us'])){
 var_dump($row_email);
  $dados ['senha_us'] = password_hash($dados['senha_us'], PASSWORD_DEFAULT);
     $_SESSION['id_email'] = $row_email['id_email'];
     $_SESSION['email'] = $row_email['email'];
     header("Location: ../../web/pagPH.php");
   }else{
     $_SESSION['msg'] = "Erro: Senha ou usuário invalido(a)!";
   }
 }else{
 $_SESSION['msg'] = "Erro: Usuário ou senha inválido(a)!";
 }
 
  }
 
  if(isset($_SESSION['msg'])){
   echo $_SESSION['msg'];
   unset($_SESSION['msg']);
  }
 ?>
