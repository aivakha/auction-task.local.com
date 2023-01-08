<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Lot Show') }}
            </h2>
            <x-button
                href="{{ route('lots.index') }}"
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
                    <div class="font-bold text-xl mb-2">{{ $lot->title }}</div>
                    @if ($lot->description)
                        <p class="text-gray-700 text-base">
                            {{ $lot->description }}
                        </p>
                    @endif
                </div>

                @if ($lot->categories->isNotEmpty())
                    <div class="px-6 pt-4 pb-2">
                        @foreach($lot->categories as $category)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                #{{ $category->title }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
