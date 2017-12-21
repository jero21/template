============
Implementaion & Testing
============

Fue implementado un prototipo de aplicación y servicio Web hosteado en un servidor visible en internet. Se utilizó PHP 5.6 sobre Apache 2.0 sobre un servidor virtual.

A continuación el resumen de casos de prueba ejecutados:

+---------+-------------+-----------------+-------------------+------------+---------------+------------+---------------+
| Estado  | Equipo      | Casos de prueba | Comportamiento    | Iteración 1| Evaluacion    | Iteración 2| Evaluacion    |
|         | Responsable |                 | esperable         | (Fecha)    |               | (Fecha)    |               |
+=========+=============+=================+===================+============+===============+============+===============+
|Resuelto |* Claudio    |Subir archivo pdf|El archivo debe    |20/12/2017  |**Ok:** archivo|21/12/2017  |**Ok:** Opera  |
|         |* Jeremías   |y comprobar que  |quedar almacenado  |            |visible pero no|            |Correctamente  |
|         |             |queda almacenado |en el directorio   |            |incorpora marca|            |               |
|         |             |para ser accedido|visible desde      |            |de tiempo.     |            |               |
|         |             |por el webservice|internet y se debe |            |               |            |               |
|         |             |desde internet   |utilizar un nombre |            |               |            |               |
|         |             |                 |de archivo que     |            |               |            |               | 
|         |             |                 |incorpore una marca|            |               |            |               |
|         |             |                 |de microtime para  |            |               |            |               |
|         |             |                 |evitar colision    |            |               |            |               |
+---------+-------------+-----------------+-------------------+------------+---------------+------------+---------------+

