# Gestor ADSO v01 — Proyecto Integrador ABP

**Programa:** Análisis y Desarrollo de Software (ADSO)  
**Centro:** Centro de la Tecnología de la Manufactura Avanzada (CTMA) — SENA Regional Antioquia  
**Competencia Laboral:** 220501094 — Estructurar propuesta técnica de servicio de tecnología de la información según requisitos técnicos y normativa  
**Instructor:** Gustavo Bolaños  
**Aprendiz:** Bryan Gómez  

---

## 📌 Descripción del Proyecto
**Gestor ADSO** es un proyecto integrador desarrollado bajo la metodología de Aprendizaje Basado en Proyectos (ABP) utilizando **PHP y Laravel**. Su objetivo es servir como plataforma de gestión y seguimiento para los aprendices, instructores, fichas y actividades formativas del programa ADSO.

Esta **Semana 1** establece la línea base técnica del proyecto: aprovisionamiento del entorno reproducible, configuración de base de datos, ejecución de migraciones y primer control de versiones con Git.

---

## 🛠️ Entorno y Versiones Reales del Equipo
Las siguientes son las versiones exactas verificadas en el entorno de desarrollo local:

* **Sistema Operativo:** Linux (Linux Mint 22.x / Ubuntu 24.04 LTS x86_64)
* **PHP:** `PHP 8.2.12 (cli)` (XAMPP LAMPP Stack — `/opt/lampp/bin/php`)
* **Composer:** `Composer version 2.10.3 (2026-08-27)` (`/home/bryan/.local/bin/composer`)
* **Laravel Framework:** `Laravel Framework 12.69.3`
* **Motor de Base de Datos:** `MariaDB 10.4.32` / MySQL Protocol (Puerto 3306)
* **Servidor Web Local:** Apache 2.4.58 (XAMPP) & Servidor CLI de Artisan
* **Control de Versiones:** `git version 2.43.0`
* **Editor de Código:** Antigravity IDE (VS Code Core `1.107.0`)

---

## 🧩 Extensiones de PHP Requeridas
Se validó la activación y carga de los siguientes módulos en `php.ini` (`/opt/lampp/etc/php.ini`):
* `openssl` (Comunicaciones y firmas criptográficas)
* `pdo_mysql` y `PDO` (Conexión orientada a objetos con MySQL/MariaDB)
* `mbstring` (Manipulación de caracteres multibyte UTF-8)
* `fileinfo` (Detección segura de tipos MIME en archivos)
* `zip` (Compresión y extracción de paquetes y dependencias)

---

## 🚀 Guía de Instalación y Despliegue Local

### 1. Clonar o acceder al proyecto
```bash
cd ~/Documentos/gestor-adso
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Configurar variables de entorno (`.env`)
Crear el archivo de entorno a partir de la plantilla y generar la llave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

Verificar que los parámetros de base de datos en `.env` coincidan con el entorno local:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Crear la Base de Datos
Desde el cliente de MySQL en consola o desde phpMyAdmin:
```sql
CREATE DATABASE IF NOT EXISTS gestor_adso 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;
```

### 5. Limpiar caché de configuración y ejecutar migraciones
```bash
php artisan config:clear
php artisan migrate
```

Tablas creadas automáticamente:
- `users`
- `password_reset_tokens`
- `sessions`
- `cache` / `cache_locks`
- `jobs` / `job_batches` / `failed_jobs`
- `migrations`

### 6. Iniciar el Servidor de Desarrollo
```bash
php artisan serve
```
Acceder en el navegador a: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📂 Estructura Principal del Proyecto
```
gestor-adso/
├── app/             # Modelos, controladores y lógica de negocio
├── bootstrap/       # Arranque y configuración del framework
├── config/          # Archivos de configuración de servicios
├── database/        # Migraciones, factories y seeders
├── public/          # Punto de entrada público (index.php, assets)
├── resources/       # Vistas Blade, CSS, JS
├── routes/          # Rutas web, api y consola
├── storage/         # Cachés, logs y almacenamiento de archivos
├── .env             # Configuración del entorno (no versionado)
├── artisan          # Consola CLI de Laravel
└── composer.json    # Manifiesto de dependencias PHP
```

---

## 📜 Historial de Control de Versiones
* `Semana 1: Entorno listo + Laravel base` — Creación del proyecto integrador, configuración de MariaDB, ejecución de migraciones y documentación técnica reproducible.
