Cuando lo descarguen:
   en la consola:
   ejecutar composer update
   en el editor duplicar .env.example y renombrarlo a .env
   configuracion de la base de datos: nombre de la base de datos tecnoprecios_lv
   en la consola ejecutar php artisan key:generate
   
   Una vez hecho todo esto, ejecutar en consola  php artisan migrate   (para que se migren los cambios en la base de datos)  ojo!!! yo primero creé en workbench una base de datos llamada tecnoprecios_lv, la única configuración que usé desde workbench fue ponerle
   collation: utf8mb4_unicode_ci
   
   Si cuando corren el migrate les tira un error avisen y les paso el tutorial!!!
   ODIO LARAVEL
   
