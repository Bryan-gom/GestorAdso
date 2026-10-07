# Gestor ADSO

Plataforma web para gestionar y hacer seguimiento a aprendices, instructores, fichas y actividades formativas del programa ADSO.

Desarrollado como proyecto integrador (ABP) con PHP y Laravel en el SENA CTMA.

---

## Requisitos previos

Para ejecutar el proyecto necesitas tener instalado:

- PHP 8.2 o superior
- Composer
- MySQL o MariaDB
- Git

---

## Instalación y puesta en marcha

Sigue estos pasos para correr el proyecto en tu máquina:

### 1. Clonar el repositorio
```bash
git clone https://github.com/Bryan-gom/GestorAdso.git
cd GestorAdso
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar variables de entorno
Crea tu archivo `.env` a partir de la plantilla y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

Revisa los datos de conexión a tu base de datos dentro de `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Crear la base de datos
Crea la base de datos `gestor_adso` desde consola o desde phpMyAdmin:
```sql
CREATE DATABASE gestor_adso CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Correr las migraciones
```bash
php artisan migrate
```

### 6. Iniciar el servidor local
```bash
php artisan serve
```

Listo. Abre tu navegador y entra a: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Estructura principal

- `app/` — Lógica de la aplicación (controladores, modelos).
- `routes/` — Rutas web y de API.
- `resources/` — Vistas Blade, estilos y scripts.
- `database/` — Migraciones y semillas de datos.
- `public/` — Punto de entrada público y recursos estáticos.

---

## Información del proyecto

- **Repositorio en GitHub:** [https://github.com/Bryan-gom/GestorAdso](https://github.com/Bryan-gom/GestorAdso)
- **Programa:** Análisis y Desarrollo de Software (ADSO)
- **Centro:** Centro de la Tecnología de la Manufactura Avanzada (CTMA) — SENA Regional Antioquia
- **Aprendiz:** Bryan Gómez
- **Instructor:** Gustavo Bolaños
