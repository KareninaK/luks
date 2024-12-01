<?php
$api_key="AIzaSyBM"; // Ingresar tu Api Key
$channel_id="UCA"; // El Id del canal
$max_results="50"; // Resultados a mostrar
 
// LLamar a la API para obtener la lista de videos en JSON
$query = "https://www.googleapis.com/;
$videoList = file_get_contents($query);
 

// Convertir el JSON a Array
$results = json_decode($videoList, true);

// Para debugear
// echo "<pre>";
// print_r($results); 
// echo "</pre>";

// Recorrer los resultados
echo "<h1>Videos Recientes del Canal</h1>";
foreach ($results['items'] as $items)
{
$id = $items['id']['videoId']; //  Id del video
$title= $items['snippet']['title']; // Titulo del video
$description = $items['snippet']['description']; // Descripcion del video
$published_at = $items['snippet']['publishedAt']; // Fecha de publicacion
$channel_title = $items['snippet']['channelTitle']; // Titulo del canal
$thumbnail = $items['snippet']['thumbnails']['default']['url']; // Imagen miniatura, 3 valores: default, medium, high
 
// Mostrar en un formato
echo "<div style='display:inline-block;width:200px;margin:10px;text-align:center;vertical-align:top'>";
echo "<img src='$thumbnail'>";
echo "<h3>$title</h3>";
echo "<p>$description</p>";
echo "<p><i>$published_at</i></p>";
echo "<p>Por <b>$channel_title</b></p>";
echo "<p><a href=\"https://youtube.com/watch?v=$id\" target='_blank'>Ver video</a></p>";
echo "</div>";
}
?>
