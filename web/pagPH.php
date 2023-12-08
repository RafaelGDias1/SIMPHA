<?php 
include_once("../confg/conexao.php");
session_start();

 if(!empty($_SESSION['usuario'])){
    echo "OLa ". $_SESSION ['nome']." , bem";
 }
 else{
    $_SESSION['msg'] = "Deslogado";
   
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>SIMPHA</title>
</head>
<body>
<nav>
        <input type="checkbox" id="check">
        <label for="check">
           <i class="burges" id="btn"></i> <!--fa fa-bars--> 
           <i class="burges-perdido" id="cancel"></i> <!--fa fa-times--> 
        </label>

       <a href="../web/pag1.php"><img src="../img/SYMPHA - LOGO 2 1.png"></a>

        <ul>
            <li><a href="pag1.php">Inicio</a></li>
           
        </ul>
       
    </nav>



    <main>

<img src="../img/moni-removebg-preview.png" alt="monitoramento" class="moni">

    <?php 

$servidor = "localhost";
$usuario = "johntccpph";
$senha = "Rafa5151";
$dbname = "projetotccph";





$connph = mysqli_connect ($servidor, $usuario, $senha, $dbname );

$db = mysqli_select_db($connph, "projetotccph");

$sql = mysqli_query($connph, "SELECT * FROM phreading") or die( 
    mysqli_error($connph) //caso haja um erro na consulta 
  );

  while($connph = mysqli_fetch_assoc($sql)) { 

    echo "<table>";

   
   echo " <tr>
     <th> Data e Hora  </th>
     <th> PH </th>
    </tr>";
  

echo "<tr>
    <td>".$connph["hora"]."</td>
    <td> ".$connph["ph"]."</td>
  </tr>
 ";
   
 
  }
?>
<script src="../js/js.js"></script>

</main>





  
</form>
</body>
</html>