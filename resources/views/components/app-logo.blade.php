@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand :name="config('app.name', 'Heal Go Fly')" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-white p-1 shadow-xs border border-gray-100">
            <img src="{{ asset('logo.png') }}" class="size-6 object-contain" alt="Heal Go Fly" />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand :name="config('app.name', 'Heal Go Fly')" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-white p-1 shadow-xs border border-gray-100">
            <img src="{{ asset('logo.png') }}" class="size-6 object-contain" alt="Heal Go Fly" />
        </x-slot>
    </flux:brand>
@endif
