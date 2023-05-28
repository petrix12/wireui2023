<p align="center">
    <a href="https://github.com/petrix12" target="_blank">
        <img src="https://petrix12.github.io/cvpetrix2022/img/logo-completo-sm.png" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">Proyecto desarrollado en Laravel</p>
<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Livewire y WireUI: Crea interfaces web responsivas de forma fácil
+ Instructor: Víctor Hernán Arana Flores
+ URL: https://codersfree.com/cursos/livewire-wireui-crea-interfaces-web-responsivas-facil

## PARTE I: Creación y configuración del proyecto
+ **Documentación**: 
    + https://livewire-wireui.com/docs/get-started
    + https://laravel-lang.com/installation
1. Crear proycto (seleccionar livewire y phpunit):
    + $ laravel new wireui2023 --jet
2. Configurar variables de entorno en **.env**.
3. Ejecutar las migraciones:
    + $ php artisan migrate
4. Instalar las dependencias de WireUI:
    + $ composer require wireui/wireui
5. Agregar la directiva **@wireUiScripts** en la plantilla principal del proyecto **resources\views\layouts\app.blade.php**:
    ```php
    <!-- ... -->
    <head>
        <!-- ... -->

        <!-- Scripts -->
        @wireUiScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <!-- ... -->
    ```
    + **Nota**: agragar la directiva justo encima de donde se esta cargando Alpine.
6. Modificar el archivo de configuración de Tailwind **tailwind.config.js**:
    ```js
    // ...
    export default {
        presets: [
            require('./vendor/wireui/wireui/tailwind.config.js')
        ],
        content: [
            // ...
            './vendor/wireui/wireui/resources/**/*.blade.php',
            './vendor/wireui/wireui/ts/**/*.ts',
            './vendor/wireui/wireui/src/View/**/*.php'
        ],
        // ...
    };
    ```
7. Para compilar los cambios:
    + $ npm run build
8. Publicar los arichivos de configuración, vistas y traducción de WireUI:
    + $ php artisan vendor:publish --tag='wireui.config'
    + $ php artisan vendor:publish --tag='wireui.resources'
    + $ php artisan vendor:publish --tag='wireui.lang'
9. Modificar la vista **resources\views\auth\register.blade.php**:
    + Cambiar el el atributo **value** por **label** en los componentes **<x-label />**.
    + En el botón de registro indicar que es de tipo submit.
10. Instalar dependencia para la traducción del proyecto:
    + $ composer require laravel-lang/common --dev
11. Publicar las traducciones en español:
    + $ php artisan lang:add es
12. Cambiar a español el idioma de la aplicación en **config\app.php**:
    ```php
    // ...
    'locale' => 'es',
    // ...
    ```


## PARTE II:
1. Crear componente Alert:
    + $ php artisan make:component Alert
2. mmm

