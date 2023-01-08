<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Categories') }}
            </h2>
            <x-button
                href="{{ route('categories.create') }}"
                variant="success"
                class="items-center max-w-xs gap-2"
            >

                <span>{{ __('Create') }}</span>
            </x-button>
        </div>
    </x-slot>

    @include('components.alerts._success')

    <div class="py-6">
        <div class="grid items-center gap-4">
            @if ($categories->isNotEmpty())
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('View') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Update') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Delete') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->title }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{ route('categories.show', $category->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        {{ __('Show') }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        {{ __('Edit') }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{Form::open(['route'=> ['categories.destroy', $category->id], 'method' => 'delete'])}}
                                    <button type="submit" class="font-medium text-blue-600 text-red-500 hover:underline">
                                        {{ __('Delete') }}
                                    </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <h3 style="text-align: center">{{ __('Create your first category') }}</h3>
            @endif
        </div>
    </div>
</x-app-layout>
