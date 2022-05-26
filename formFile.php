<?php 
  $path = "imagenesLocalizaciones/". basename($_FILES['imagen']['name']); 
  echo $_POST['imagen'];
  if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
      echo "El archivo ".  basename( $_FILES['imagen']['name']). " ha sido subido";
  } else{
      echo "El archivo no se ha subido correctamente";
  }
?>

<form  action="#" method="post" enctype="multipart/formdata" >
  <input type="file" name="imagen">
  <input type="submit" value="Subir">
</form>