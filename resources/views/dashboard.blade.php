<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- CTA --}}
                    <livewire:adm.painel-button/>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- STUDENTS TABLES --}}
                    @livewire('student.index')
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- STUDENTS TABLES --}}
                    @livewire('gallery.index')
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- USERS TABLES --}}
                    @livewire('users.users')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
