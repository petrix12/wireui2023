<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-container>
                <x-alert type="success">
                    <x-slot name="title">
                        Prueba
                    </x-slot>
                    Soluciones++
                </x-alert>
        </x-container>
    </div>
</x-app-layout>
