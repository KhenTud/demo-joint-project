<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <title>{{ $pageTitle }} | {{ config('app.name', 'JointProject') }}</title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __('CHIUY | ') }} {{ _('WELCOME TO | ') }} {{ $pageTitle }} --}}
                    <livewire:bronya.admin.form-create-project/>
                    <livewire:bronya.admin.list-project/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
