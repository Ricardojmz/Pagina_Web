<?php 
$archivo = $_FILES['foto']['name']; //$_files['foto'] es la variable que se envía del formulario y se captura con files en vez de post o get.
/**************** BLOQUE PARA SUBIR EL ARCHIVO **************/
if ($archivo!=""){
$directorio = "../fotogaleria/galeria/"; //este es el directorio donde estara la foto
if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
$file = $directorio . $_FILES['foto']['name'] ;
@copy($_FILES['foto']['tmp_name'], $file);
$subio = true;
} else {
echo "Possible file upload attack: ";
echo "filename '". $_FILES['userfile']['tmp_name'] . "'.";
}
}
