<?php
include ('conexion.php');
$id    = (isset($_POST['id']))            ?$_POST['id']            :"";
$imagen= (isset($_FILES['image']['name']))?$_FILES['image']['name']:NULL;
$accion= (isset($_POST['accion']))        ?$_POST['accion']        :"";

switch($accion){
    case"Agregar":
        $tamanio_imagen=$_FILES['image']['size'];
        
        $sqlE = "DELETE FROM banner WHERE ID='1'";
        $result = $base->prepare($sqlE);
        $result->execute();

        if ($tamanio_imagen<=2000000){
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectosK/luks/img/';

            move_uploaded_file($_FILES['image']['tmp_name'],$carpeta_destino.$imagen);

            $sqlA = "INSERT INTO banner (id, image) VALUES (1, '$imagen')";
            $resultado = $base->prepare($sqlA);
            $resultado->execute();
        }else{
            echo "Tamaño maximo de imagen 2000000 bytes";
        }
    break;

    case"Eliminar":
        $sqlE = "DELETE FROM banner WHERE ID='$id'";
        $result = $base->prepare($sqlE);
        $result->execute();
    break;
}
		
$sqlS = "SELECT * FROM banner ORDER BY id ASC";
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
					<input type="hidden" name="id" placeholder="" id="id"  value="<?php echo $id;?>">	
				</td>
			</tr>
			<tr>
				<td>
					<label for ="">Imagen:</label>
					<input type="file" accept="image/*" name="image" size="20" placeholder="" id="image">
				</td>
            </tr>
            <tr>
				<td>
                    <button type="submit" name="accion" value="Agregar">Agregar</button>
                </td>
            </tr>
        </table>
    </form>
    <div>
		<table>
			<thead>
				<tr>
					<td>Imagen</td>
					<td>Acción</td>
				</tr>
			</thead>
		<?php 
			foreach ($lista as $result ) {?>				
		 	<tr>
				<td> <?php if($result['image']!=''){?> <img witdth="50px" height="50px" src="img/<?php echo $result['image']; ?>"><?php ; } ?></td>
			<td>
				<form accion="" method="POST">	
					<input type="hidden" name="id" value="<?php echo $result['id']; ?>">				
					<input type="hidden" name="image" value="<?php echo $result['image']; ?>">				
					<!-- <a href="mod-image.php?id=<?php //echo $result['id']; ?>"><input type="button" value="Modificar"></a> -->
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