===============================================================
Diseño -  Modelo 4+1 - Documento 1 (Software Architecture Document)
===============================================================

El método 4+1 nos permitirá describir la arquitectura de sistemas software llamado Repositorio para análisis de Archivos PDF de Tesis, basados en el uso de múltiples vistas concurrentes.
Estas vistas nos permitirán analizar el problema y describir el sistema desde el punto de vista de distintos interesados, como lo son los usuarios finales (Usuario profesor guía y Usuario estudiante tesista), los desarrolladores y/o jefes de proyecto.

Las cuatro vistas del modelo son:

#. Vista lógica.
#. Vista de desarrollo. 
#. Vista de proceso. 
#. Vista física. 
#. Además, una selección de casos de uso o que se utilizará para ilustrar la arquitectura sirviendo como una vista más. 

**Dichas vistas se mencionan a continuación:**

:Vista lógica:
^^^^^^^^^^^^^^

Está enfocada en describir la estructura y funcionalidad del sistema, y para éste sistema se utilizó un diagrama de Clases para representar esta Vista. El cual está separado en 2 package:

#. Package AppAnalizarTesis: 

* Clases 1: Index
* Clase 2: ProcesarTesisPdf

#. Package WS-AnalizarPDF (Servicio Web):

* Clase 1: AnalizarPdf
* Clase 2: Parser

La siguiente imágen fue creada con la herramienta **draw.io**

.. image:: image/d_clases.png

La siguiente imágen fue creada mediante código con la herramienta **codetouml** http://londres.ceisufro.cl/codetouml

.. image:: codetouml/diagrama_clases.png

:Vista de desarrollo:
^^^^^^^^^^^^^^^^^^^^^

Ilustra el sistema de la perspectiva del programador y está enfocado en la administración de los artefactos de software.
El Diagrama Componentes UML se utiliza para describir los componentes del sistema.
El cual contiene dos componentes


#. Componente 1: App Analizar Tesis
#. Componente 2: Servicio Web Analizar PDF

**Ambos conectados mediante el protocolo HTTP.**

La siguiente imágen fue creada con la herramienta draw.io

.. image:: image/d_componentes.png

:Vista de proceso:
^^^^^^^^^^^^^^^^^

Explica los procesos de sistema y cómo se comunican. se enfoca en el comportamiento del sistema en tiempo de ejecución

Esta vista se representará con un diagrama de Actividad.

En él se detallan tres actores:

#. Usuario
#. App
#. Servidor Web

.. image:: image/d_actividad.png


:Vista fisica:
^^^^^^^^^^^^^^

Describe el sistema desde el punto de vista de un ingeniero de sistemas. Está relacionada con la topología de componentes de software en la capa física (hardware), así como las conexiones físicas entre estos componentes.

En el se muestra dos nodos, como capa física y dentro de ellos sus artefactos o componentes de software:

#. Nodo 1: Workstation

* Componente Browser.

#. Nodo 2: Servidor Web

* Servicio web Analizar PDF
* Parser (Librería PHP que permite leer un archivo PDF)


.. image:: image/d_despliegue.png

:Escenarios:
^^^^^^^^^^^^

Los escenarios describen secuencias de interacciones entre objetos, y entre procesos. Se utilizan para identificar y validar el diseño de arquitectura. También sirven como punto de partida para pruebas de un prototipo de arquitectura.
La descripción de la arquitectura se ilustra utilizando un conjunto de casos de uso.

En el, se modelan tres casos de uso y dos actores del sistema.

#. Actores:

* Profesor Guía
* Alumno tesista

#. Casos de uso:

* Mostrar formulario upload tesis.
* Subir Archivo PDF.
* Mostrar resultado análisis tesis pdf.

.. image:: image/d_casos_uso.png
