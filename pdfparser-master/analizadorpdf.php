<?php
include 'vendor/autoload.php';

class analizadorPdf {

  public $contenido, $cantidad_paginas, $cantidad_caracteres, $url_pdf;
  public $method, $request, $token;

  public function __construct() {
	// get the HTTP method, path and body of the request
	$this->method = $_SERVER['REQUEST_METHOD'];
	$this->request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	$this->contenido = "";
	$this->cantidad_paginas = 0;
	$this->cantidad_caracteres = 0;
	$this->url_pdf = "";
	$this->token = "";
  }
  
  function obtener_atributos_pdf($token) {

	//validar método y request
	if (strtoupper($this->method) != 'GET') {
		echo 405; //'Method Not Allowed'
		exit;
	}
	if (sizeof($this->request) != 4) {
		echo 400; //'Bad Request'
		exit;
	}

	//Obtener primer parámetro: Nombre de servidor
	$servidor = $this->request[0];
	
	//Obtener segundo parametro (y acondicionarlo): Path a archivo
	$path_archivo = $this->request[1];
	$path_archivo = str_replace(".","/",$path_archivo);
	
	//Obtener tercer parámetro: Archivo pdf
	$archivo_pdf = $this->request[2];
	
	//Obtener cuarto parámetro: token de control de acceso al webservice
	if ($this->request[3] != $token) {
		echo 401; //'Bad Request'
		exit;
	}

	//Generar URL al archivo pdf que se debe verificar
	$this->url_pdf = "http://$servidor/$path_archivo/$archivo_pdf";
	
	//Validar si URL existe
	$encabezados = get_headers($this->url_pdf);
	if(!strpos($encabezados[0],"200"))
	{
		echo 404; //'Not Found'
		exit;
	}
	
	try {
		//Procesar archivo PDF y obtener atributos
		$parser = new \Smalot\PdfParser\Parser();
		$pdf    = $parser->parseFile($this->url_pdf);
		 
		//Obtener $contenido, $cantidad_paginas, $cantidad_caracteres
		$this->contenido = $pdf->getText();
		$details  = $pdf->getDetails();
		$this->cantidad_paginas = $details['Pages'];
		$this->cantidad_caracteres = strlen($this->contenido);
		
	}
	catch (Exception $e) {
		//echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		echo 500; //'Internal Server Error'
		exit;
	}
	
	//Empaquetar y enviar resultado en formato JSON
	$arr = array('contenido' => $this->contenido, 'paginas' => $this->cantidad_paginas, 'caracteres' => $this->cantidad_caracteres);
	echo json_encode($arr);

	}
}

$atributos = new analizadorPdf();
echo $atributos->obtener_atributos_pdf("1AEFB345EFA");

?>