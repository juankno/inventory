<div align="center">
  <h1>Inventory</h1>
  <p>Sistema para gestionar un inventario básico de productos y sus categorías.</p>
</div>

---

## Tabla de Contenidos

- [Introducción](#introducción)
- [Documentación](#documentación)
- [Requisitos Previos](#requisitos-previos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Licencia](#licencia)

---

## Introducción

Inventory es una solución integral diseñada para gestionar un inventario básico de productos y sus categorías.

---

## Documentación

- [Documentación de la API]()
- [Visor de Logs]()

---

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

- [Laravel](https://laravel.com/docs/12.x)
- [Composer](https://getcomposer.org/download)

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

5. Inicia el servidor de desarrollo:

   ```bash
   php artisan serve
   ```

El proyecto estará disponible en `http://localhost:8000`.

---

## Uso

Una vez configurado, puedes acceder a las siguientes herramientas:

- **Documentación de la API**: Explora los endpoints disponibles.
- **Visor de Logs**: Revisa los registros de la aplicación.

---

## Licencia

El framework de este proyecto es software de código abierto licenciado bajo la licencia MIT.
