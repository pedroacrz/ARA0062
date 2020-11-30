<?php
session_start();

$login=$_POST["login"];
$senha=$_POST["senha"];

include_once "servico/Bd.php";

$bd = new Bd();
$sql = "select * from usuario_3006 where login='$login' and senha='$senha'";
//
//NAO protege contra SQL Injection
//
foreach ($bd->query($sql) as $row) {
    $_SESSION["autenticado"]=true;
    $_SESSION["idusuario"]=$row['id'];
    $_SESSION["loginusuario"]=$row['login'];
    
    $html ="
    <script language='javascript' type='text/javascript'>
          window.location.
          href='menu.php'</script>
"; 
    echo $html;
    return;
}
//se a consulta retornar vazia, nem entra no foreach
//e o usuário digitou os dados incorretos.
session_destroy ( ) ;
    $html ="
<script>alert('Usuário não encontrado')
window.location.href='index.html'</script>
</html>
";
    
echo $html;
return;
?>