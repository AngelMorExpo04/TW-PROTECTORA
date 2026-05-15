# GuauHub: Repositorio de Adopciones Responsables

GuauHub es una plataforma web integral diseñada para gestionar una protectora de animales, utilizando una metáfora visual y funcional basada en **GitHub**. El objetivo es profesionalizar el proceso de adopción, tratando a cada animal como un "repositorio" y a cada solicitud como una "Pull Request".

Este proyecto ha sido desarrollado siguiendo los estándares académicos de la asignatura de **Tecnologías Web**, priorizando la separación de capas, el rendimiento y la accesibilidad sin dependencias externas innecesarias.

---

## Arquitectura Frontend (The "Vanilla" Philosophy)

Una de las decisiones técnicas más importantes de GuauHub es la **ausencia total de frameworks de terceros como Bootstrap o Tailwind**. Todo el diseño ha sido construido desde cero utilizando **Vanilla CSS**.

*   **Diseño 100% a medida (No Frameworks)**: Se descartó el uso de frameworks externos como **Bootstrap** o Tailwind. Uno de los motivos técnicos principales fue la restricción del entorno de host, que presentaba limitaciones para la descarga y despliegue de dependencias externas. Ante este reto, se optó por una solución más robusta y eficiente: desarrollar todo el sistema visual a mano con **Vanilla CSS**, garantizando que la web funcione correctamente en cualquier servidor sin dependencias de terceros.
*   **HTML5 Semántico**: Para una estructura clara y accesible.
*   **CSS3 Avanzado**: Uso intensivo de **Flexbox** y **Grid Layout** para lograr una interfaz totalmente responsive.
*   **Zero JavaScript**: Siguiendo los requisitos de la rúbrica, todas las interacciones de la interfaz (modales, menús, validaciones) funcionan exclusivamente mediante lógica de selectores CSS.

### Componentes Destacados
*   **Modales CSS-Only**: Implementados mediante la técnica del `checkbox hack`. El estado del modal (abierto/cerrado) se controla a través de un input de tipo checkbox invisible y el selector `:checked` de CSS.
*   **GitHub Aesthetic**: Hemos imitado la paleta de colores (`#2da44e`, `#cf222e`, `#1f2328`), las fuentes y los bordes redondeados de GitHub para crear una experiencia de usuario familiar para desarrolladores.
*   **Tarjetas de Repositorio**: Los animales se presentan como tarjetas que incluyen etiquetas de estado (`status badges`), lenguajes (especies) y descripciones breves.

---

## Arquitectura Backend (Laravel MVC)

El proyecto utiliza el framework **Laravel** bajo el patrón **Modelo-Vista-Controlador (MVC)**, asegurando un código limpio y escalable.

### Lógica de Controladores
*   **AnimalController**: Gestiona el CRUD completo de los animales. Incluye lógica de autorización para que solo los voluntarios puedan realizar altas, bajas o modificaciones (Settings).
*   **AdoptionRequestController**: Maneja el flujo de las "Pull Requests". Un adoptante crea la solicitud y un voluntario puede aceptarla o cerrarla, lo cual cambia automáticamente el estado del animal en la base de datos.
*   **AuthController**: Sistema de autenticación personalizado que gestiona el registro y login, diferenciando entre los roles de `adoptante` y `voluntario`.
*   **FavoriteController**: Permite a los usuarios "guardar" animales en su lista de favoritos, simulando el sistema de "Stars" de GitHub.

---

## Modelo de Datos (Base de Datos)

La base de datos ha sido diseñada mediante **Migraciones de Laravel**, lo que garantiza la integridad y portabilidad del esquema.

### Entidades Principales
1.  **Users**: Almacena los datos de acceso, correo y el `rol` (clave para la seguridad del panel).
2.  **Animals**: Contiene la ficha técnica de cada mascota (nombre, raza, sexo, estado de salud, descripción e imagen).
3.  **Adoption_Requests**: Tabla intermedia que conecta usuarios con animales, guardando el estado de la solicitud (`open`, `accepted`, `closed`).
4.  **Favorites**: Relación muchos-a-muchos para el seguimiento de mascotas.
5.  **Contact_Tickets**: Almacena las dudas de soporte enviadas a través del formulario de contacto.

---

## Instalación y Configuración

Para desplegar este repositorio en un entorno local, sigue estos pasos:

1.  Clonar el repositorio.
2.  Instalar dependencias: `composer install`.
3.  Configurar el archivo `.env` con tus credenciales de base de datos.
4.  Generar la clave de aplicación: `php artisan key:generate`.
5.  Ejecutar las migraciones: `php artisan migrate --seed`.
6.  Iniciar el servidor: `php artisan serve`.

---

## Desarrolladores (Maintainers)

Este proyecto ha sido desarrollado con pasión por:
*   **Angel Moreno** - Lead Maintainer
*   **Pablo Ordoñez** - Backend Engineer
*   **Guillermo Moyano** - UI/UX Designer

---

> **Nota Académica**: Este sitio web ha sido validado para cumplir con los estándares de accesibilidad W3C y no utiliza librerías de JavaScript externas para sus funcionalidades principales, demostrando un uso avanzado de las capacidades nativas de HTML5 y CSS3.
