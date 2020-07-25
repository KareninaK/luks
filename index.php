<?php
include ("../conexion.php");
$id     = (isset($_POST['id']))      ? $_POST['id']       : "";
$texto  = (isset($_POST['editor']))  ? $_POST['editor']   : "";
$accion = (isset($_POST['accion']))  ? $_POST['accion']   : "";

if (isset($_POST['editor'])){

      switch ($accion){
        case"Guardar":
          $sql = "INSERT INTO noticias (contenido) VALUE ('$texto')";
          $result = $base->prepare($sql);
          $result->execute();	

          if ($sql){
            echo "agregado";
          }else{
            echo "no anda";
          }
      
        break;

        case"Eliminar":
          $sqlE = "DELETE FROM noticias WHERE id='$id'";
          $result = $base->prepare($sqlE);
          $result->execute();	
        break;
      }		
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
      <input type="hidden" name="id" id="id">	
      <textarea class="ckeditor" name="editor"></textarea>
      <input type="submit" name="accion" value="Guardar">
    </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Contenido</td>
                        <td>Acción</td>                       
                    </tr>
                </thead>
                <?php 
                foreach ($lista as $result ) {?>				
                    <tr>
                      <td> <?php echo $result['contenido']; ?> </td>              
                      <td>
                          <form accion="" method="POST">	
                              <input type="hidden" name="id" value="<?php $result['id']; ?>" />				
                              <input type="hidden" name="editor" value="<?php  $result['contenido']; ?>" />
                              <a href="mod-index.php?id=<?php echo $result['id']; ?>"><input type="button" value="Modificar"></a>
                              <button type="submit" name="accion" value="Eliminar">Eliminar</button>
                          </form>
                      </td>
                    </tr>			
                <?php 			
                } ?>
            </table>
        </div>			
  </body>
</html>

