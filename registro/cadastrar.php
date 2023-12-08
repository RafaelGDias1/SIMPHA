<?php
//require ('../confg/conexao.php');
session_start();
ob_start();

$CadEntrar = filter_input(INPUT_POST, 'CadEntrar', FILTER_SANITIZE_STRING);
if($CadEntrar){
    include_once ('../confg/conexao.php');
    $conn = filter_input_array(INPUT_POST, FILTER_DEFAULT);
   //var_dump($conn);
  $conn['senha'] = password_hash($conn['senha'], PASSWORD_DEFAULT);

  $result_usuario = "INSERT INTO tb_usuario ( nome, email, usuario, senha) VALUES (
     '".$conn['nome']."', 
     '".$conn['email']."', 
    '".$conn['usuario']."', 
    '".$conn['senha']."')";

  $resultado_usuario = mysqli_query($dados , $result_usuario);
  if(mysqli_insert_id($dados)){
    $_SESSION['msgcard'] = "cadastro feito com sucesso!";
    header("Location: ../usuario/telalogin.php");

  }else{
    $_SESSION['msg'] = "Erro ao cadastra!";

  }
}



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpha</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>


    <form method="post" action="..//usuario/telalogin.php">
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script> 

    <center>
      <div class="card"> <!-- cad-card-->


            <div class="card-rigth"> <!--cad-rigth-->
            <a href="../web/pag1.php"><svg width="300" height="106" viewBox="0 0 494 106" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_11_67)">
              <path d="M120.37 92.11L123.72 79.8C128.74 82.66 135.64 84.82 143.22 84.82C149.72 84.82 154.05 82.16 154.05 77.33C154.05 71.81 148.24 69.35 141.64 66.4C132.68 62.26 121.74 57.14 121.74 45.03C121.74 32.92 132.48 26.32 145.87 26.32C152.96 26.32 162.02 28.09 166.75 30.65L163.3 42.67C158.77 40.21 151.38 38.34 146.36 38.34C140.35 38.34 136.71 40.8 136.71 45.14C136.71 50.26 142.52 53.02 149.12 56.07C158.08 60.11 168.92 64.84 168.92 77.34C168.92 89.06 159.56 96.84 143.71 96.84C136.03 96.84 125.98 95.07 120.37 92.11Z" fill="#0754B0"/>
              <path d="M181.04 27.59H195.62V95.55H181.04V27.59Z" fill="#0754B0"/>
              <path d="M213.45 27.59H231.08L247.82 69.75H248.61L265.65 27.59H282.98L284.95 95.55H270.37L269.19 51.23H268.4L252.84 88.36H242.2L226.83 51.23H226.04L224.66 95.55H211.36L213.43 27.59H213.45Z" fill="#0754B0"/>
              <path d="M300.32 27.59H323.56C339.81 27.59 349.27 35.96 349.27 50.24C349.27 64.52 339.81 73.09 323.56 73.09H314.89V95.55H300.31V27.59H300.32ZM323.27 61.08C330.16 61.08 334.3 57.14 334.3 50.34C334.3 43.54 330.16 39.6 323.27 39.6H314.9V61.07H323.27V61.08Z" fill="#010E54"/>
              <path d="M361.39 27.59H375.97V55.27H403.06V27.59H417.64V95.55H403.06V67.28H375.97V95.55H361.39V27.59Z" fill="#010E54"/>
              <path d="M472.69 80.98H446.1L441.37 95.56H426.1L450.33 27.6H469.54L493.77 95.56H477.42L472.69 80.98ZM469.14 70.15L459.78 41.39H458.99L449.63 70.15H469.13H469.14Z" fill="#010E54"/>
              <path d="M79.16 8.05V0H0V97.95H24.15V106H103.31V8.05H79.16ZM52.48 87.62C34.24 87.62 22.89 67.81 32.11 52.07L52.48 17.32L72.85 52.07C82.07 67.81 70.72 87.62 52.48 87.62Z" fill="#010E54"/>
              <path d="M45.09 76.82C44.79 76.82 44.48 76.73 44.22 76.54C37.31 71.59 35.92 65.91 35.86 65.67C35.67 64.86 36.17 64.06 36.98 63.87C37.78 63.69 38.59 64.18 38.78 64.99C38.79 65.04 39.96 69.8 45.96 74.1C46.63 74.58 46.79 75.52 46.31 76.19C46.02 76.6 45.56 76.82 45.09 76.82Z" fill="#010E54"/>
              </g>
              <defs>
              <clipPath id="clip0_11_67">
              <rect width="493.77" height="106" fill="white"/>
              </clipPath>
              </defs>
              </svg>
            </a>

              <div class="card-login"> <!--cad-login-->

                <h2>Cadastrar</h2>

                        <?php
                          if(isset($_SESSION['msgcard'])){
                          echo $_SESSION['msgcard'];
                          unset ($_SESSION['msgcard']);

                          }
                        ?> 

                <div class="darde"> <!--cad-->
                  <span class="icon"><ion-icon name="person"></ion-icon></span> 
                  <label for="name"></label>
                  <input type="test" name="usuario" placeholder="Digite seu nome" required>
                </div>

                <div class="darde"> <!--cad-->
                  <span class="icon"><ion-icon name="mail"></ion-icon></span> 
                  <label for="email"></label>
                  <input type="test" name="usuario" placeholder="Digite seu e-mail" required>
                </div>

                <div class="darde">
                  <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>		
                  <label for="senha"></label>
                  <input type="password" name="senha" placeholder="Digite sua senha" required >
                </div>
        
                <input class="butao" type="submit" value="Cadastrar" name="btcdst"> <!--btn-->
            
                <a href="../usuario/telalogin.php"><input class="butao" value="Já tenho uma conta" name="NTC"></a>

              </div>
            </div>
      </div>
    </center>
  

    </form>
    
    
</body>
</html>