

## Consideraciones para montar el proyecto

El archivo .sql de DB esta incluido en el proyecto, tambien incluyo un modelo en workbench para hacer Foward engineering
los archivos se llaman: db_elj.sql (archivo sql de DB), model_dogs.mwb (modelo workbench)

Seguramente sera necesario modificar el archivo .env del proyecto Laravel, reestablecer valores por defecto

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_elj
DB_USERNAME=root
DB_PASSWORD=

Configuracion de proyecto en node con valores por defecto, no deberia haber ningun problema al conectarnos con el proyecto
de NODE a la DB para consultar los datos, de ser asi, se puede modificar la configuracion de la conexion en el archivo
database.js en la ruta /helpers/database.js

El proyecto en Laravel ya viene con registros de test cargados, ademas ya existe una compilacion de recursos de VUE 
con webpack, por lo cual las vistas ya estan compiladas.