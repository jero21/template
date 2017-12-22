[<actor> Alumno Tesista]
[<actor> Profesor Guía] -> [<frame> Sistema de repositorio y versionado ;de tesis]
[<frame> Sistema de repositorio y versionado ;de tesis
|
  [<usecase> Mostrar formulario; upload tesis] <-- <<extend>>  [<usecase> Subir archivo; PDF]
  
  [<usecase> Subir archivo; PDF] <<include>> --> [<usecase> Mostrar resultado; análisis tesis pdf]
  
]