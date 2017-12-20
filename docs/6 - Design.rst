========
Diseño -  Modelo 4+1 - Documento 1
========

El método 4+1 nos permitirá describir la arquitectura de sistemas software llamado Repositorio para análisis de Archivos PDF de Tesis, basados en el uso de múltiples vistas concurrentes.
Estas vistas nos permitirán analizar el problema y describir el sistema desde el punto de vista de distintos interesados, como lo son los usuarios finales (Usuario profesor guía y Usuario estudiante tesista), los desarrolladores y/o jefes de proyecto.

Las cuatro vistas del modelo son:

#. Vista lógica.
#. Vista de desarrollo. 
#. Vista de proceso. 
#. Vista física. 
#. Además, una selección de casos de uso o que se utilizará para ilustrar la arquitectura sirviendo como una vista más. 

Dichas vistas se mencionan a continuación:

:Vista lógica:

Está enfocada en describir la estructura y funcionalidad del sistema, y para éste sistema se utilizó un diagrama de Clases para representar esta Vista. El cual está separado en 2 package:

+-------+---------------------------+
| "1. " | Package AppAnalizarTesis: |
+-------| (Clases 1: Index)+        |
        +---------------------------+

.. image:: image/d_clases.png

:Vista de desarrollo:

.. image:: image/d_componentes.png

:Vista de proceso:


:Vista fisica:

.. image:: image/d_despliegue.png

:Escenarios:

.. image:: image/d_casos_uso.png
