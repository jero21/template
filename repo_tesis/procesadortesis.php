<?php

class ProcesadorTesis {


  public $nombreServidor,$nombreArchivo, $rutaArchivo, $url_ws, $copia_ok;
  public $contenido_tesis_txt, $numero_caracteres_tesis_txt, $numero_paginas_tesis_txt;
  
  
  public function __construct($nombreServ,$rutaArch,$url_webservice) {
    //Inicializa atributos
	$this->nombreServidor = $nombreServ;
	$this->rutaArchivo = $rutaArch;
	$this->url_ws = $url_webservice;

	
	//Copia el archivo al directorio files y queda disponible 
	//para ser accesado por el Web Service
	$this->nombreArchivo = date("d-m-Y.H-i-s",time()).".".microtime(true).".pdf";
	if (@move_uploaded_file($_FILES['archivopdf']['tmp_name'], "files/".$this->nombreArchivo)) {
		$this->copia_ok = "ok";
	} else {
		$this->copia_ok = "";
	}
  }
  
  function desplegar_resultados($nombreUsu,$udEstaAq,$token) {
	  //Reset 
	  $error="";
	  $total_paginas=0;
	  $total_caracteres=0;
	  
	  //Validar recepción archivo
	  if ($this->copia_ok == "") {
		  $error = "<b>Error Upload:</b> Ha ocurrido un error al intentar almacenar el archivo pdf en el directorio files/.<br><br>";
	  }

	  //Construir URL --> invocar Web Service --> Obtener resultados análisis

	  //Validar si URL existe
	  $encabezados = get_headers($this->url_ws."/".$this->nombreServidor."/".str_replace("/",".",$this->rutaArchivo)."/".$this->nombreArchivo);
	  if(!strpos($encabezados[0],"200")) {
		$error = "<p style='color:Tomato;'><b>Error 503:</b> El servicio web configurado no se encuentra disponible.</p><br><br>";
	  }
	  else {
		  $respuesta = file_get_contents($this->url_ws."/".$this->nombreServidor."/".str_replace("/",".",$this->rutaArchivo)."/".$this->nombreArchivo."/".$token);

		  //Procesa el resultado siempre que el WS no devuelva error
		  if (is_numeric($respuesta)) {
			  $error = "<p style='color:Tomato;'><b>Error $respuesta:</b> Ha ocurrido un error al intentar procesar el archivo.</p><br><br>";
		  }
		  else {
			  $respuesta = json_decode($respuesta);
			
			  $this->contenido_tesis_txt = $respuesta->{'contenido'};
			  $this->numero_paginas_tesis_txt = $respuesta->{'paginas'};
			  $this->numero_caracteres_tesis_txt = $respuesta->{'caracteres'};
			  
			  //Dar formato a números de páginas y de caracteres
			  $total_paginas = number_format($this->numero_paginas_tesis_txt);
			  $total_caracteres = number_format($this->numero_caracteres_tesis_txt,0,",",".");
		  }
	  }
	  //Desplegar resultado
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
    <td>Bienvenido:  $nombreUsu</td>
	<td align="right">Ud. se encuentra aquí:  $udEstaAq</td>
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
$error
<table style="width:670px">
  <tr>
	<td>El documento contiene $total_paginas páginas y $total_caracteres caracteres. El texto contenido se presenta a continuación:</td>
  </tr>
</table>
<br>
<textarea readonly class="scrollabletextbox" name="note" rows="4" cols="92">
  $this->contenido_tesis_txt
</textarea>

<table style="width:670px">
  <tr><td  align="right">
	<form>
	  <input type="button" value="Volver" onclick="history.back()">
	  <button type="button" disabled>Guardar</button>
	  </input>
	</form>
  </td></tr>
</table>

<br><br><br><br>
<img src="footer.png" alt="Pie">
</body>

</html>
EOD;
    echo($str);

  }
}

$resultados = new ProcesadorTesis("35.192.225.221","lab/repo_tesis/files","http://35.192.225.221/lab/pdfparser-master/analizadorpdf.php");
$resultados->desplegar_resultados("Jeremías","Análisis de Documentos PDF","1AEFB345EFA");  

?>