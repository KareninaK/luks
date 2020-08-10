<?php
 $nombre  =(isset($_POST['nombre']))  ? $_POST['nombre']   : "";
 $email   =(isset($_POST['email']))   ? $_POST['email']    : "";
 $mensaje =(isset($_POST['mensaje'])) ? $_POST['mensaje']  : "";

 //Datos para el correo
 $destino = "";//correo de luks
 $asunto  = "Contacto desde la web";

 $carta= "De: $nombre \n";
 $carta .="Correo: $email \n";
 $carta .="Mensaje: $mensaje";

 //Enviando mensaje
 mail($destino, $asunto, $carta);
 echo'<script type="text/javascript">
        alert("mensaje enviado exitosamente");
        window.location.href="form-contacto.html";
        </script>';

?>