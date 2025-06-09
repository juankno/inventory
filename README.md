<div align="center">
    <h1>Inventory</h1>
    <p>Sistema para gestionar un inventario básico de productos y sus categorías.</p>
</div>

---

## Tabla de Contenidos

-   [Introducción](#introducción)
-   [Documentación](#documentación)
-   [Requisitos Previos](#requisitos-previos)
-   [Instalación](#instalación)
-   [Migraciones](#migraciones)
-   [Uso](#uso)
-   [Licencia](#licencia)

---

## Introducción

Inventory es una solución integral diseñada para gestionar un inventario básico de productos y sus categorías.

### Estructura del Proyecto

El proyecto sigue una arquitectura en capas bien definida:

-   **Controllers (app/Http/Controllers)**: Manejan las peticiones HTTP y delegan la lógica de negocio a los repositorios.
-   **Models (app/Models)**: Definen la estructura de datos y las relaciones entre entidades:
    -   `User`: Gestión de usuarios y autenticación
    -   `Category`: Categorías de productos
    -   `Product`: Productos del inventario
-   **Repositories (app/Repositories)**: Implementan el patrón Repository para abstraer la lógica de acceso a datos:
    -   `CategoryRepository`: Operaciones CRUD para categorías
    -   `ProductRepository`: Operaciones CRUD para productos
    -   `UserRepository`: Gestión de usuarios
-   **Factories (database/factories)**: Facilitan la creación de datos de prueba
-   **Migrations (database/migrations)**: Definen la estructura de la base de datos

### Sistema de Autenticación

El sistema utiliza Laravel Sanctum para la autenticación, proporcionando:

-   **Tokens de API**: Autenticación segura para la API mediante tokens
-   **Control de Acceso**: Políticas y roles de usuario definidos en `UserRole` para gestionar permisos
-   **Seguridad**: Protección contra CSRF y XSS

La elección de Sanctum se justifica por:

1. Simplicidad y ligereza para APIs
2. Integración nativa con Laravel
3. Soporte para SPA y aplicaciones móviles
4. Gestión eficiente de tokens
5. Capacidad de revocar tokens
6. Los roles de usuario se definen de forma simple por la escala del proyecto

---

## Documentación

-   [Documentación de la API (Remota)](https://inventory-production-c63f.up.railway.app/docs/api#/)
-   [Visor de Logs (Remoto)](https://inventory-production-c63f.up.railway.app/log-viewer)
-   **Documentación local:** Una vez el proyecto esté en funcionamiento, accede a la documentación de la API en `http://localhost:8000/docs/api#/`.
-   **Logs locales:** Puedes revisar los logs de la aplicación en `http://localhost:8000/log-viewer` o directamente en el directorio `storage/logs`.

---

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

-   [Laravel](https://laravel.com/docs/12.x)
-   [Composer](https://getcomposer.org/download)

---

## Instalación

Sigue estos pasos para configurar el proyecto:

1. Clona este repositorio:

    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd <NOMBRE_DEL_DIRECTORIO>
    ```

2. Instala las dependencias de PHP:

    ```bash
    composer install
    ```

3. Copia el archivo de configuración de ejemplo y renómbralo:

    ```bash
    cp .env.example .env
    ```

4. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```

---

## Migraciones

Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

O ejecuta las migraciones con datos de ejemplo:

```bash
php artisan migrate --seed
```

---

## Uso

1.  Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

2.  Accede a las siguientes herramientas:

    -   **Documentación de la API:** [http://localhost:8000/docs/api#/](http://localhost:8000/docs/api#/)
    -   **Visor de Logs:** [http://localhost:8000/log-viewer](http://localhost:8000/log-viewer)
    -   **Logs locales:** Archivos en `storage/logs`

3.  Usa los siguientes usuarios de prueba para acceder al sistema:

    -   **Usuario:** Test User  
        **Email:** test@example.com  
        **Contraseña:** password

    -   **Usuario:** Admin User
        **Email:** admin@example.com  
         **Contraseña:** password

---

## Licencia

El framework de este proyecto es software de código abierto licenciado bajo la licencia MIT.
