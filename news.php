<?php include ('../conexion.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    	<?php
                $sqlE = "SELECT * FROM noticias ORDER BY id DESC";
				$result = $base->prepare($sqlE);
				$result->execute();

				$lista=$result->fetchAll(PDO::FETCH_ASSOC);
				foreach ($lista as $res ) { ?>
                    <td> <?php echo $res['contenido'];  ?> </td>
                <?php }
        ?>


        	<?php
                $sqlv = "SELECT * FROM videos ORDER BY id DESC";
				$resultado = $base->prepare($sqlv);
				$resultado->execute();

				$lista=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach ($lista as $rest ) { ?>
                    <td> <?php echo $rest['contenido'];  ?> </td>
                    <td> <?php echo $rest['descripcion'];  ?> </td>
                    <td> <?php echo $rest['link'];  ?> </td>
                <?php }
        ?>


        <?php
                $sqlg = "SELECT * FROM guias ORDER BY id DESC";
				$resultado = $base->prepare($sqlg);
				$resultado->execute();

				$lista=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach ($lista as $rest ) { ?>
                    <td> <?php echo $rest['contenido'];  ?> </td>
                    <td> <?php echo $rest['descripcion'];  ?> </td>
                    <td> <?php echo $rest['link'];  ?> </td>
                <?php }
        ?>
    </body>
</html>