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
9. Modificar las vista **resources\views\auth\register.blade.php** y **resources\views\auth\login.blade.php**:
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


## PARTE II: Creación de componentes de clases y anonimos
+ **Documentación**: https://v1.tailwindcss.com/components/alerts
1. Crear componente de clase Alert:
    + $ php artisan make:component Alert
2. Diseñar vista del componente **resources\views\components\alert.blade.php**:
    ```php
    {{-- @props(['type' => 'success'])
    @php
        switch ($type) {
            case 'success':
                $clases = 'bg-green-100 border border-green-400 text-green-700';
                $classIcon = 'text-green-500';
                break;
            case 'error':
                $clases = 'bg-red-100 border border-red-400 text-red-700';
                $classIcon = 'text-red-500';
                break;
            default:
                $clases = 'bg-blue-100 border border-blue-400 text-blue-700';
                $classIcon = 'text-blue-500';
                break;
        }
    @endphp --}}

    <div class="{{ $clases }} px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ $title }}</strong>
        <span class="block sm:inline">
            {{ $slot }}
        </span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 {{ $classIcon }}" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>    
    ```
3. Programar el controlador del componente **app\View\Components\Alert.php**:
    ```php
    // ...
    class Alert extends Component
    {
        public $clases;
        public $classIcon;
        /**
        * Create a new component instance.
        */
        public function __construct($type = 'success')
        {
            switch ($type) {
                case 'success':
                    $this->clases = 'bg-green-100 border border-green-400 text-green-700';
                    $this->classIcon = 'text-green-500';
                    break;
                case 'error':
                    $this->clases = 'bg-red-100 border border-red-400 text-red-700';
                    $this->classIcon = 'text-red-500';
                    break;
                default:
                    $this->clases = 'bg-blue-100 border border-blue-400 text-blue-700';
                    $this->classIcon = 'text-blue-500';
                    break;
            }
        }
        // ...
    }
    ```
4. Crear componente anonimo **resources\views\components\container.blade.php**:
    ```php
    
    ```
5. Modificar vista **resources\views\dashboard.blade.php** para probar el componente:
6. mmm

