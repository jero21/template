============
Anexos
============

:A. Código Diagrama de Clases con CodeToUml:

[package AppAnalizarTesis|
  [ Index
  |nombreUsuario: String
  |udEstaAqui: String
  |urlUpload: String
  ||desplegarFormUpload()
 ]

 [ ProcesadorTesisPdf
 |nombreArchivo: String
 |rutaArchivo: String
 |nombreServidor: String
 |url_ws: String
 |contenido_tesis_txt: String
 |numero_caracteres_tesis: number
 |numero_paginas_tesis: number
 ||desplegarResultado(String nombreUsuario, String udEstaAqui, String token)
 ]
]

[package WS-AnalizarPDF|
 [ AnalizadorPdf
  |cantidad_paginas: number
  |cantidad_caracteres: number
  |contenido: String
  |url_pdf: String
  ||obtener_atributos_pdf(String token): json
 ] +-->  [ Parser
  |parseFile(String path): json 
  |getText(): String
  |getDetails(): String
  |desplegarFormUpload()
 ]
]

:B. Código Diagrama Actividad con CodeToUml:

[Sistema de repositorio y versionado de tesis|
  [Usuario|
   [<start> start] -- [<state> Accede al;sistema]
   [<state> Accede al;sistema]--> [<state> Subir archivo; PDF de Tesis]|
   [<state> Visualizar y analiza; resultados de la tesis] -->  [<end> end]
  ]
  [Aplicacion|
   [<state> Generar nombre;de archivo a partir;fecha y hora]--> [<state> Crear copia de archivo; en carpeta temporal]
   [<state> Crear copia de archivo; en carpeta temporal] ---> [<state> Construir URL para; llamado del web service]
   [<state> Construir URL para; llamado del web service] --> [<state> Realiza petición; GET y espera; respuesta] 
   [<state> Realiza petición; GET y espera; respuesta]
  ]
  [Servicio Web|
   [<state> Valida solicitud; GET]--> [<state> Obtener ;parámetros]
   [<state> Obtener ;parámetros] --> [<state> Validar Token]
   [<state> Validar Token] -->  [<state> Construír URL ;para buscar PDF]
   [<state> Construír URL ;para buscar PDF] --> [<state> Valida si ;existe URL]
   [<state> Valida si ;existe URL] --> [<state> Obtiener texto del; pdf, cantidad de; caracteres y ;de páginas]
   [<state> Obtiener texto del; pdf, cantidad de; caracteres y ;de páginas] --> [<state> Retorna respuesta; en formato JSON]

  ]
]

:C. Código Diagrama de Casos de Uso con CodeToUml:

[<actor> Alumno Tesista]
[<actor> Profesor Guía] -> [<frame> Sistema de repositorio y versionado ;de tesis]
[<frame> Sistema de repositorio y versionado ;de tesis
|
  [<usecase> Mostrar formulario; upload tesis] <-- <<extend>>  [<usecase> Subir archivo; PDF]
  
  [<usecase> Subir archivo; PDF] <<include>> --> [<usecase> Mostrar resultado; análisis tesis pdf]
  
]
