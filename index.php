<?php
include ("../conexion.php");
$id     = (isset($_POST['id']))      ? $_POST['id']       : "";
$texto  = (isset($_POST['editor']))  ? $_POST['editor']   : "";

$accion = (isset($_POST['accion']))  ? $_POST['accion']   : "";

  switch ($accion){
    case"eliminar":
      $sqlP = "DELETE FROM noticias WHERE id = '$id'";
      $result = $base->prepare($sqlP);
      //var_dump($sqlE);exit;
      $result->execute();	
     break;

     case"Guardar":
      $sql = "INSERT INTO noticias (contenido) VALUE ('$texto')";
      $result = $base->prepare($sql);
      $result->execute(); 
  
    break;
  }		

$sqlS = "SELECT * FROM noticias ORDER BY id DESC";
$res = $base->prepare($sqlS);
$res->execute();
 
$lista=$res->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="ckeditor.js"></script>
  </head>

  <body>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" placeholder="" id="id">	
      <textarea class="ckeditor" name="editor"></textarea>
        <script> CKEDITOR.replace( 'editor', {
        filebrowserBrowseUrl: '../ckfinder/ckfinder.html',
        filebrowserUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        } );</script>
      <input type="submit" name="accion" value="Guardar">
    </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Id</td> 
                        <td>Contenido</td>
                        <td>Acción</td>                       
                    </tr>
                </thead>
                <?php 
                foreach ($lista as $result) {?>				
                    <tr>
                      <td> <?php echo $result['id']; ?></td>
                      <td> <?php echo $result['contenido']; ?> </td>              
                      <td>
                          <form action="" method="POST">	
                              <input type="hidden" name="id" value="<?php echo $result['id']; ?>">				
                              <input type="hidden" name="editor" value="<?php  $result['contenido']; ?>">
                              <a href="mod-index.php?id=<?php echo $result['id']; ?>"><input type="button" value="Modificar"></a>
                              <button type="submit" name="accion" value="eliminar">Eliminar</button>
                          </form>                          
                      </td>
                    </tr>			
                <?php 			
                } ?>
            </table>
        </div>			
  </body>
</html>