<?php 
include ('../conexion.php');

$id     = (isset($_POST['id']))      ? $_POST['id']       : "";
$texto  = (isset($_POST['editor']))  ? $_POST['editor']   : "";
//$accion = (isset($_POST['accion']))  ? $_POST['accion']   : "";

$sqlM = "UPDATE noticias SET  contenido='$texto' WHERE id='$id'";
//var_dump($sqlM);exit;
$result = $base->prepare($sqlM);
$result->execute();

$idget= $_GET['id'];
$sql="SELECT * FROM noticias WHERE id= '$idget'";
$res = $base->prepare($sql);
$res->execute();

$row= $res->rowCount();

if($row == 0){
}else{
    $lista=$res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($lista as $result ) {			
        $id      = $result['id']; 
        $texto  = $result['contenido'];   
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="ckeditor.js"></script>
  </head>
  <body>
    <form action="" method="post" >
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <textarea class="ckeditor" name="editor" ><?php echo $texto; ?></textarea>
      <?php
      // var_dump($id);
      // var_dump($texto);exit;
      ?>
      <input type="submit" name="accion" value="Guardar">
      <a href="index.php"><input type="button" value="Volver"></a>                     
    </form>  
    <div>
      <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Contenido</td>                    
            </tr>
        </thead>
        <?php 
        foreach ($lista as $result ) {?>       
            <tr>
                <td> <?php echo $id;  ?> </td>
                <td> <?php echo $texto; ?></td>
                <td>
                    <form accion="" method="POST">  
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">    
                        <input type="hidden" name="titulo" value="<?php  $result['contenido']; ?>">
                    </form>
                </td>
            </tr>     
        <?php       
        } ?>
      </table>
    </div>      	
  </body>
</html>