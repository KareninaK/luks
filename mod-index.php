<?php 
include ('../conexion.php');

$id     = (isset($_POST['id']))      ? $_POST['id']       : "";
$texto  = (isset($_POST['editor']))  ? $_POST['editor']   : "";
$accion = (isset($_POST['accion']))  ? $_POST['accion']   : "";

$sqlM = "UPDATE noticias SET  contenido='$texto' WHERE id='$id'";
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
$sqlS = "SELECT * FROM noticias ORDER BY id desc";

$res = $base->prepare($sqlS);
$res->execute();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="ckeditor.js"></script>
  </head>

  <body>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" placeholder="" id="id" value="<?php echo $id;?>">
      <textarea class="ckeditor" name="editor" value="<?php echo $texto ?>"></textarea>
      <input type="submit" name="accion" value="Guardar">
 
    <a href="index.php"><input type="button" value="Volver"></a>
                             
    </form>
      			
  </body>
</html>
