INSTRUCCIONES PARA MONTAR EL PROYECTO

Clonar el repositorio
git clone https://github.com/lucasSferraro2002/PaginaGalleta.git
Instalar dependencias
composer install
Configurar archivo .env si hace falta
Editar .env y configurar base de datos:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fortuna
DB_USERNAME=root
DB_PASSWORD=
Crear base de datos
Abrir MySQL y ejecutar:
CREATE DATABASE fortuna, o crearla de forma manual;
Ejecutar migraciones
php artisan migrate
Cargar datos iniciales
php artisan db:seed --class=FraseSeeder
php artisan db:seed --class=AdminUserSeeder
Iniciar el servidor
php artisan serve
Abrir en el navegador
http://localhost:8000

CREDENCIALES DE ACCESO
Administrador:
Email: admin@admin.com
Password: 123456
Usuario normal:
Email: usuario@usuario.com
Password: 123456
