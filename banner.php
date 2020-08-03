<?php
include ('conexion.php');
$id =       (isset($_POST['id']))                ?$_POST['id']                :"";
$temporal = (isset($_FILES['image']['tmp_name']))?$_FILES['image']['tmp_name']:"";
$imagen =   (isset($_FILES['image']['name']))    ?$_FILES['image']['name']    :NULL;
$accion =   (isset($_POST['accion']))            ?$_POST['accion']            :"";

switch($accion){
    case"Agregar":       
        $sqlE = "DELETE FROM baner WHERE ID='1'";
        $result = $base->prepare($sqlE);
		$result->execute();
		
		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectosK/luks/img/';

		if ($_FILES['image']['type'] == 'image/jpeg'){
			$original = imagecreatefromjpeg($temporal);
		}else if ($_FILES['image']['type'] == 'image/png'){
			$original = imagecreatefrompng($temporal);
		}else {
			die ('No se pudo crear la imagen');
		}
		
		$ancho_original = imagesx($original);
		$alto_original = imagesy($original);

		//$ancho_nuevo = 800;
		$alto_nuevo = 445;
		$ancho_nuevo = round ($alto_nuevo * $ancho_original / $alto_original);
		//$alto_nuevo = round($ancho_nuevo * $alto_original / $ancho_original); //round elimina los decimales del calculo 
	
		$copia= imagecreatetruecolor($ancho_nuevo,$alto_nuevo);

		imagecopyresampled($copia, $original, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);

		imagejpeg($copia, $carpeta_destino.$imagen, 100 );

		imagedestroy($original);
		imagedestroy($copia);

		$sqlA = "INSERT INTO baner (id, image) VALUES (1, '$imagen')";
		$resultado = $base->prepare($sqlA);
		$resultado->execute();
        
    break;

    case"Eliminar":
        $sqlE = "DELETE FROM baner WHERE ID='$id'";
        $result = $base->prepare($sqlE);
        $result->execute();
    break;
}
		
$sqlS = "SELECT * FROM baner ORDER BY id ASC";
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
				<td> <?php if($result['image']!=''){?> <img witdth="200px" height="200px" src="img/<?php echo $result['image']; ?>"><?php ; } ?></td>
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

