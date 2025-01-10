Este archivo explica la funcionalidad del sistema.
NOTA1: Hay algunas áreas del código comentadas ya que dicho código me funcionaba con postman pero no con la interfaz del sistema.
NOTA2: Algunos endpoint funcionan en postman y otros funcionan directo en el navegador.

el nombre de la carpeta del codigo es api_utal_v1

una vez descargado el codigo fuente se debe almacenar dentro de la siguiente ruta si es que ud usa XAMPP
C:\xampp\htdocs

luego en un navegador se debe ingresar la siguiente ruta usando en endpoint /login: http://localhost/api_utal_v1/login

Para iniciar sesión puede usar el siguiente usuario
correo: Robbie.Frami@hotmail.com
password: man

Si desea puede ver mas usuarios dentro del siguiente enlace de mockapi
https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/

Por defecto el sistema carga el endpoint /list mostrando todos los usuarios (por efectos de seguridad no se muestra la  password)

Luego presionando el botón verde puede crear un Nuevo usuario llenando los campos y presionando el boton Crear Cuenta.

Una vez presionado el botón veremos el endpoint /new

Luego podemos escribir nuevamente en la url /list para listar los usuarios nuevamente.

En el menú de la izquierda tenemos Mis Datos para cargar la data del usuario registrado usando endpoint /me/{id}.

La segunda opciòn de menú es listar los usuarios q usa el endpoit /list

La tercera opción de menú es dar de baja mi usuario que usa el endpoint /delete/{id}

la última opción es la que cierra la sesión utilizando el endpoint /logout.

NOTA 3: TODOS LOS ENDPOINT SE ENCUENTRAN CREADOS EN EL ARCHIVO routes.php (aplication->config->routes.php)





