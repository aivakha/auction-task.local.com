<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Category Edit') }}
            </h2>
        </div>
    </x-slot>

    @include('components.alerts._errors')

    <div class="py-6">
        <div class="grid items-center gap-4">
            {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put', 'class' => 'bg-white rounded-md p-5 dark:bg-slate-800']) !!}
            <div class="form-group mb-6">
                <label class="font-semibold uppercase leading-tight text-sm mt-0 mb-2 text-white-600 block">
                    {{ __('Title*') }}
                </label>
                <input type="text" name="title" value="{{ $category->title }}" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

            <div class="mt-5 text-right">
                <button class="inline-flex items-center transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2 px-4 py-2 text-base bg-green-500 text-white hover:bg-green-600 focus:ring-green-500 rounded-md items-center max-w-xs gap-2 text-right">{{ __('Update') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>
