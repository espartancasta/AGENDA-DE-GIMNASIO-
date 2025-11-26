💪 Gym Manager – Laravel 12

Sistema de Gestión de Gimnasio

Proyecto desarrollado con Laravel 12, autenticación con Breeze, roles, y módulo de dominio para la gestión de membresías.

🚀 Funcionalidades principales
🔐 Autenticación y roles

Registro, login y logout.

Roles:

Administrador: gestiona usuarios y membresías.

Staff: gestiona únicamente las membresías.

Cliente: solo accede a su panel.

👥 Gestión de Usuarios (solo admin)

Crear usuarios

Editarlos

Activarlos / desactivarlos

Listado de todos los usuarios

🏋️‍♂️ Gestión de Membresías (admin + staff)

Crear membresías

Editarlas

Activarlas / desactivarlas

Listado de membresías

🔒 Protección por middlewares

Uso de middleware personalizado role para restringir accesos:

->middleware(['role:admin'])
->middleware(['role:admin,staff'])
->middleware(['role:client'])

📦 Instalación

Clonar repositorio:

git clone <URL_DE_TU_REPOSITORIO>
cd gym-app


Instalar dependencias de PHP:

composer install


Configurar env:

cp .env.example .env
php artisan key:generate


Configurar base de datos SQLite:

touch database/database.sqlite


Migraciones + seeders:

php artisan migrate --seed


Instalar dependencias frontend:

npm install
npm run dev


Levantar servidor:

php artisan serve

👤 Usuario administrador por defecto

Tras correr los seeders, tienes:

Rol	Email	Password
Admin	admin@gym.local
	password
Staff	staff@gym.local
	password
Cliente	client@gym.local
	password
🧱 Tecnologías utilizadas

Laravel 12

Laravel Breeze (auth)

TailwindCSS

PHP 8.2+

SQLite

Vite

📁 Estructura relevante del proyecto
app/
 ├── Http/
 │    ├── Controllers/
 │    ├── Middleware/RoleMiddleware.php
 │    └── Requests/
 └── Models/
      ├── User.php
      ├── Role.php
      └── Membership.php
resources/
 ├── views/
 └── components/
routes/
 ├── web.php
 └── auth.php

📝 Notas para evaluación

✔ Middleware funcional para roles
✔ Protección de rutas correcta
✔ Módulo de dominio entregado (membresías)
✔ CRUD de usuarios (solo admin)
✔ Autenticación con Breeze
✔ Seeders configurados
✔ Buen manejo de plantillas con componentes Blade
✔ README profesional