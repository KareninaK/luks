<?php
include ('conexion.php');
    $id     =(isset($_POST['id']))      ? $_POST['id']       : "";
    $titulo =(isset($_POST['titulo']))  ? $_POST['titulo']   : "";
    $desc   =(isset($_POST['descrip'])) ? $_POST['descrip']  : "";
    $link   =(isset($_POST['link']))    ? $_POST['link']     : "";

    $codigo=substr($link , 32);    
    
    $accion =(isset($_POST['accion']))  ? $_POST['accion']   : "";
    switch ($accion){
        case"Agregar":
            $sql = "INSERT INTO guias (titulo, descripcion, link) VALUES ('$titulo', '$desc', '$codigo')";
            $res = $base->prepare($sql);
            $res->execute();
        break;

        case"Eliminar":
            $sqlE = "DELETE FROM guias WHERE ID='$id'";
			$result = $base->prepare($sqlE);
			$result->execute();	
    }

    $sqlS = "SELECT * FROM guias order by id desc";

    $res = $base->prepare($sqlS);
    $res->execute();
    
    $lista=$res->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="id" placeholder="" id="id">	
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for ="">Titulo:</label>
                        <input type="text"  name="titulo"  placeholder="" id="titulo"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for ="">Descripcion:</label>
                        <textarea  name="descrip"  placeholder="" id="descrip"> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for ="">Link:</label>
                        <input type="text"  name="link" placeholder="" id="link">
                    </td>
                </tr> 
                <tr>
                    <td> 
                        <input type="submit" name="accion" value="Agregar" />  
                    </td>
                </tr>         
            </table>
        </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Descripción</td>
                        <td>Link</td>
                        <td>Acción</td>
                        
                    </tr>
                </thead>
                <?php 
                foreach ($lista as $result ) {
                    $video = $result['link'];?>				
                    <tr>
                        <td> <?php echo $result['titulo'];  ?> </td>
                        <td> <?php if($result['descripcion']!=''){echo $result['descripcion'] ; } ?></td>
                        <td> <?php echo "<iframe width=\"500\" height=\"500\" src=\"https://www.youtube.com/embed/$video\"></iframe>";  ?> </td>
                    <td>
                        <form accion="" method="POST">	
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">				
                            <input type="hidden" name="titulo" value="<?php echo $result['titulo']; ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $result['descripcion']; ?>">
                            <input type="hidden" name="link" value="<?php echo $result['link']; ?>">
                            <a href="mod-guias.php?id=<?php echo $result['id']; ?>"><input type="button" value="Modificar"></a>
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

