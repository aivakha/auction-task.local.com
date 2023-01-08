<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Category Show') }}
            </h2>
            <x-button
                href="{{ route('categories.index') }}"
                variant="info"
                class="items-center max-w-xs gap-2"
            >
                <span>{{ __('Return Back') }}</span>
            </x-button>
        </div>
    </x-slot>

    @include('components.alerts._success')

    <div class="py-6">
        <div class="grid items-center gap-4">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">{{ $category->title }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
