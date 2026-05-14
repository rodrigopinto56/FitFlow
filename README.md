<p align="center">
  <img src="public/images/logo.png" alt="Logo" width="150"/>
</p>
#  Sistema de Rutinas de Ejercicio

Aplicación web desarrollada en Laravel para gestionar rutinas de entrenamiento personalizadas. Los usuarios pueden crear y administrar sus rutinas, mientras que los administradores gestionan el catálogo global de ejercicios.


## 🛠 Tecnologías

- **Laravel 12** + PHP 8.2
- **MySQL** con phpMyAdmin
- **Laravel Breeze** — autenticación
- **Laravel Sanctum** — API con tokens
- **Bootstrap 5.3** — vistas


##  Instalación

```bash
# 1. Clonar el repositorio
git clone https://github.com/TU_USUARIO/rutinas-ejercicio.git
cd rutinas-ejercicio

# 2. Instalar dependencias
composer install
npm install && npm run build

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar base de datos en .env
DB_DATABASE=rutinas_ejercicio
DB_USERNAME=root
DB_PASSWORD=

# 5. Migrar y poblar la base de datos
php artisan migrate:fresh --seed

# 6. Iniciar servidor
php artisan serve
```

Visita `http://localhost:8000`


##  Usuarios de prueba

| Rol   | Email                  | Contraseña |
|-------|------------------------|------------|
| Admin | admin@rutinas.com      | password   |
| User  | juan@rutinas.com       | password   |
| User  | maria@rutinas.com      | password   |


##  API REST

Base URL: `http://localhost:8000/api`

Obtener token:
```http
POST /api/login
Content-Type: application/json

{ "email": "admin@rutinas.com", "password": "password" }
```

Usar token en las siguientes peticiones:
```
Authorization: Bearer {token}
```

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/exercises` | Listar ejercicios |
| POST | `/api/exercises` | Crear ejercicio |
| PUT | `/api/exercises/{id}` | Actualizar ejercicio |
| DELETE | `/api/exercises/{id}` | Eliminar ejercicio |
| GET | `/api/routines` | Listar rutinas |
| POST | `/api/routines` | Crear rutina |
| PUT | `/api/routines/{id}` | Actualizar rutina |
| DELETE | `/api/routines/{id}` | Eliminar rutina |


##  Roles

| Acción | Admin | Usuario |
|--------|-------|---------|
| Gestionar ejercicios | ✅ | ❌ |
| Ver catálogo ejercicios | ✅ | ✅ |
| CRUD rutinas propias | ✅ | ✅ |
| Ver todas las rutinas | ✅ | ❌ |



##  Estructura principal

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── ExerciseController.php
│   │   ├── RoutineController.php
│   │   ├── RoutineExerciseController.php
│   │   └── Api/
│   │       ├── ExerciseApiController.php
│   │       └── RoutineApiController.php
│   └── Middleware/
│       └── CheckRole.php
├── Models/
│   ├── User.php
│   ├── Exercise.php
│   ├── Routine.php
│   └── RoutineExercise.php
database/
├── migrations/
└── seeders/
resources/views/
├── layouts/
├── exercises/
├── routines/
└── routine_exercises/
```

---

Proyecto Final — Diseño de Aplicaciones Web