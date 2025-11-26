Este ZIP contiene solo:
- app/Models (Role, Membership)
- app/Http/Controllers (UserController, MembershipController)
- app/Http/Middleware/RoleMiddleware
- database/migrations (roles, memberships, users modificada)
- database/seeders (roles, usuarios)
- routes/web.php
- algunas vistas Blade básicas

Instrucciones rápidas:
1. Crea un proyecto nuevo de Laravel (composer create-project laravel/laravel gym-app).
2. Instala Breeze y corre migraciones básicas.
3. Copia el contenido de este ZIP encima de tu proyecto (sobreescribe archivos existentes).
4. Ejecuta:
   php artisan migrate:fresh --seed
5. Entra con:
   admin@gym.local / password
