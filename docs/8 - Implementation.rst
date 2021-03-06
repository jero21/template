============
Implementación y Testing
============

Fue implementado un prototipo de aplicación y servicio Web hosteado en un servidor visible en internet. Se utilizó PHP 5.6 sobre Apache 2.0 sobre un servidor virtual.

A continuación el resumen de casos de prueba ejecutados:

+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
| Estado  | Equipo      | Casos de prueba    | Comportamiento            | Iteración 1| Evaluacion    | Iteración 2| Evaluacion    |
|         | Responsable |                    | esperable                 | (Fecha)    |               | (Fecha)    |               |
+=========+=============+====================+===========================+============+===============+============+===============+
|Resuelto |* Claudio    |Subir archivo pdf   |El archivo debe            |20/12/2017  |**NO Ok:**     |21/12/2017  |**Ok:** Opera  |
|         |* Jeremías   |y comprobar que     |quedar almacenado          |            |archivo visible|            |Correctamente  |
|         |             |queda almacenado    |en el directorio           |            |pero no        |            |               |
|         |             |para ser accedido   |visible desde              |            |incorpora marca|            |               |
|         |             |por el webservice   |internet y se debe         |            |de tiempo      |            |               |
|         |             |desde internet      |utilizar un nombre         |            |               |            |               |
|         |             |                    |de archivo que             |            |               |            |               |
|         |             |                    |incorpore una marca        |            |               |            |               |
|         |             |                    |de microtime para          |            |               |            |               |
|         |             |                    |evitar colision            |            |               |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
|Resuelto |* Claudio    |Verificar que las   |                           |19/12/2017  |**Ok:** llamada|            |               |
|         |* Jeremías   |llamadas al Ws      |                           |            |construida de  |            |               |
|         |             |sean consistentes   |                           |            |forma correcta.|            |               |
|         |             |en métodos y        |                           |            |               |            |               |
|         |             |parametros.         |                           |            |               |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
|Resuelto |* Claudio    |Comprobar operación |                           |20/12/2017  |**No Ok:**     |20/12/2017  |**Ok:** Opera  |
|         |* Jeremías   |de aplicacioón      |                           |            |aplicacion     |            |Correctamente  |
|         |             |cuando el Ws se     |                           |            |presenta       |            |               |
|         |             |encuentra           |                           |            |mensajes de    |            |               |
|         |             |inaccesible         |                           |            |error y no     |            |               |
|         |             |                    |                           |            |controla       |            |               |
|         |             |                    |                           |            |ejecucion      |            |               |
|         |             |                    |                           |            |cuando el Ws   |            |               |
|         |             |                    |                           |            |no responde o  |            |               |
|         |             |                    |                           |            |no existe.     |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
|Resuelto |* Claudio    |Implementar         |Implementar por lo menos   |21/12/2017  |**Ok:**        |            |               |
|         |* Jeremías   |mensajes de error   |                           |            |Simulados y    |            |               |
|         |             |basado en códigos   |* 503 Service Unavailable  |            |verificados los|            |               |
|         |             |http para cada      |* 405 Method Not Allowed   |            |mensajes       |            |               |
|         |             |tarea ejecutada     |* 400 Unauthorized         |            |de error del   |            |               |
|         |             |por el webservice   |* 401 Bad Request          |            |webservice.    |            |               |
|         |             |                    |* 404 Not Found            |            |               |            |               |
|         |             |                    |* 500 Internal Server Error|            |               |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
|Resuelto |* Claudio    |Comprobar que el    |                           |19/12/2017  |**Ok:** texto  |21/12/2017  |               |
|         |* Jeremías   |texto desplegado    |                           |            |es consistente.|            |               |
|         |             |es consistente      |                           |            |               |            |               |
|         |             |con el contenido    |                           |            |               |            |               |
|         |             |del documento pdf   |                           |            |               |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
|Resuelto |* Claudio    |Comprobar que el    |                           |19/12/2017  |**Ok:** texto  |21/12/2017  |               |
|         |* Jeremías   |conteo de páginas   |                           |            |es consistente.|            |               |
|         |             |es consistente      |                           |            |               |            |               |
|         |             |con el contenido    |                           |            |               |            |               |
|         |             |del documento pdf   |                           |            |               |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
|Resuelto |* Claudio    |Comprobar que el    |                           |19/12/2017  |**Ok:** texto  |21/12/2017  |               |
|         |* Jeremías   |conteo de caracteres|                           |            |es consistente.|            |               |
|         |             |es consistente      |                           |            |               |            |               |
|         |             |con el contenido    |                           |            |               |            |               |
|         |             |del documento pdf   |                           |            |               |            |               |
+---------+-------------+--------------------+---------------------------+------------+---------------+------------+---------------+
