============
Deployment
============

*La aplicación se encuentra disponible en:*
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

http://35.192.225.221/lab/repo_tesis/

*El servicio web está en línea en:*
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

http://35.192.225.221/lab/pdfparser-master/analizadorpdf.php

Las solicitudes al servicio web deben efectuarse usando el método GET, considerando los siguientes parámetros:

**http://35.192.225.221/lab/pdfparser-master/analizadorpdf.php/servidor_donde_esta_el_pdf/ruta_pdf/archivo_pdf/token**

*Ejemplo:*
^^^^^^^^^^^^

Por ejemplo esta solicitud:

**http://35.192.225.221/lab/pdfparser-master/analizadorpdf.php/mi.dominio.com/lab.repo_tesis.files/capitulo1.pdf/1AEFB345EFA**

...analiza el archivo que se encuentra en: 

*http://mi.dominio.com/lab/repo_tesis/files/capitulo1.pdf*

**Repositorio Github de la aplicación y documentación arquitectónica:**
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

https://github.com/jero21/template
