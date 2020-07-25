<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/config.js"></script>
</head>
<body>
	<textarea name="editor1"></textarea>             
</body>
<script>CKEDITOR.replace( 'editor1', {
	extraPlugins: 'easyimage',
	//extraPlugins = 'cloudservices',
	removePlugins: 'image',

    cloudServices_tokenUrl: 'http://localhost/proyectosK/luks/Carga.php/cs-token-endpoint',
    //cloudServices_uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
} );</script>
</html>