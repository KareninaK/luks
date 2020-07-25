<?php 
include ('conexion.php');
    $id     =(isset($_POST['id']))      ? $_POST['id']       : "";
    $titulo =(isset($_POST['titulo']))  ? $_POST['titulo']   : "";
    $desc   =(isset($_POST['descrip'])) ? $_POST['descrip']  : "";
    $link   =(isset($_POST['link']))    ? $_POST['link']     : "";

    $sqlM = "UPDATE guias SET titulo='$titulo', descripcion='$desc', link='$link' WHERE ID='$id'";
    $result = $base->prepare($sqlM);
    $result->execute();

    $idget= $_GET['id'];
    $sql="SELECT * FROM guias WHERE ID= $idget";
    $res = $base->prepare($sql);
    $res->execute();

    $row= $res->rowCount();

    if($row == 0){
    }else{
        $lista=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lista as $result ) {			
            $id      = $result['id']; 
            $titulo  = $result['titulo'];  
            $desc    = $result['descripcion'];
            $link    = $result['link'];    
        }
    }
    $sqlS = "SELECT * FROM guias ORDER BY id desc";

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
                        <input type="hidden" name="id" placeholder="" id="id" value="<?php echo $id;?>">	
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for ="">Titulo:</label>
                        <input type="text"  name="titulo"  placeholder="" id="titulo" value="<?php echo $titulo;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for ="">Descripcion:</label>
                        <textarea  name="descrip" rows="10" cols="50" placeholder="" id="descrip"><?php echo $desc; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for ="">Link:</label>
                        <input type="text"  name="link" placeholder="" id="link" value="<?php echo $link;?>">
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
                    </tr>
                </thead>
                <?php 
                foreach ($lista as $result ) {?>				
                    <tr>
                        <td> <?php echo $result['titulo'];  ?> </td>
                        <td> <?php if($result['descripcion']!=''){echo $result['descripcion'] ; } ?></td>
                        <td> <?php echo $result['link'];  ?> </td>
                    <td>
                        <form accion="" method="POST">	
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">				
                            <input type="hidden" name="titulo" value="<?php echo $result['titulo']; ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $result['descripcion']; ?>">
                            <input type="hidden" name="link" value="<?php echo $result['link']; ?>">
                        </form>
                    </td>
                    </tr>			
                <?php 			
                } ?>
            </table>
        </div>			
    </body>
</html>