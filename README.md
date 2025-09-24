# 📌 Proyecto Laravel 12 - Gestión de Usuarios y Contratos

---

## 🚀 Requisitos
- PHP ^8.2
- Composer
- Laravel ^12.0
- MySQL o cualquier base de datos compatible con Laravel

---

## 📦 Dependencias

### Producción (`require`)
| Librería | Versión | Descripción |
|----------|---------|-------------|
| **php** | ^8.2 | Lenguaje requerido para ejecutar Laravel |
| **laravel/framework** | ^12.0 | Framework principal de PHP para aplicaciones web |
| **laravel/tinker** | ^2.10.1 | Consola interactiva para ejecutar comandos y probar código en Laravel |

---

### Desarrollo (`require-dev`)
| Librería | Versión | Descripción |
|----------|---------|-------------|
| **fakerphp/faker** | ^1.23 | Generador de datos falsos para pruebas y seeders |
| **laravel/pail** | ^1.2.2 | Visualización de logs en tiempo real |
| **laravel/pint** | ^1.24 | Herramienta de formateo y estilo de código PHP |
| **laravel/sail** | ^1.41 | Entorno de desarrollo basado en Docker para Laravel |
| **mockery/mockery** | ^1.6 | Librería para crear mocks en pruebas unitarias |
| **nunomaduro/collision** | ^8.6 | Mejor manejo de errores y excepciones en consola |
| **phpunit/phpunit** | ^11.5.3 | Framework de testing para pruebas unitarias y funcionales |

---

## ⚙️ Funcionalidades principales
- CRUD de usuarios.  
- Subida de contratos en formato PDF.  
- Almacenamiento de contratos en `storage/app/public/contracts`.  
- Visualización de contratos desde la tabla de usuarios con enlace en nueva pestaña.  

---

## ▶️ Ejecución del proyecto
```bash
# Instalar dependencias
composer install

# Configurar variables de entorno
cp .env.example .env
php artisan key:generate

# Migrar base de datos
php artisan migrate

# Crear link simbólico para acceder a los contratos
php artisan storage:link

# Levantar el servidor
php artisan serve
