<?php

class Index {

  public $nombreUsuario, $udEstaAqui, $url_upload;

  public function __construct($nombre,$ruta,$url) {
    //Inicializa atributos de presentación y url que recibirá el archivo pdf
	$this->nombreUsuario = $nombre;
	$this->udEstaAqui = $ruta;
	$this->url_upload = $url;
  }

  function desplegar_form_upload() {
	//Despliega el formulario para upload de archivo
	$str = <<<EOD
<!DOCTYPE HTML>
<html>
<head>
<title>Repositorio para Trabajos de Tesis</title>
</head>

<body>
<img src="header.png" alt="Encabezado">
<table style="width:670px">
  <tr>
    <td>Bienvenido:  $this->nombreUsuario</td>
	<td align="right">Ud. se encuentra aquí:  $this->udEstaAqui</td>
  </tr>
</table>
<table style="width:670px">
  <tr>
    <td align="left"><img src="sin_botones.png" alt=""></td>
    <td align="center"><h1>Upload de Documentos PDF</h1></td>
	<td align="right"><img src="botones.png" alt="Botones"></td>
  </tr>
</table>
<hr width="670px" align="left">

<br><br>

<table style="width:670px">
  <tr>
	<td><img src="pdf2txt.png" alt="Encabezado"></td>
    <td>
		<form method="post" action="$this->url_upload" enctype="multipart/form-data">
		  Utilíce el botón "Seleccionar archivo" para seleccionar un archivo PDF y a continuación haga clic en el botón "Enviar":
		  <br><br>
		  <input type="file" name="archivopdf" accept=".pdf">
		  <input type="submit">
		</form>
	</td>
  </tr>
</table>
<br><br><br><br><br><br><br><br><br><br>

<img src="footer.png" alt="Pie">
</body>

</html>
EOD;
    echo($str);
  }

}

$pag_inicio = new Index("Jeremías","Análisis de Documentos PDF","http://35.192.225.221/lab/repo_tesis/procesadortesis.php");
$pag_inicio->desplegar_form_upload();

?>
