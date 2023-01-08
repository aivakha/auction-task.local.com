<x-guest-layout>
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div class="min-h-screen flex">
            <nav class="w-56 flex-none pt-10">
                <form>
                    <div class="form-group form-check mb-1">
                        <h5 class="font-semibold uppercase leading-tight text-sm mt-0 mb-2 text-white-600">{{ __('By category') }}</h5>
                        @foreach($categories as $category)
                            <div class="form-group form-check mb-1">
                                <input type="checkbox"
                                       name="categories[]"
                                       class="form-check-input appearance-none h- w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" value="{{ $category->id }}"
                                       id="{{ $category->id }}"
                                        @if (request()->input('categories') && in_array($category->id, request()->input('categories'))) checked @endif>
                                <label class="form-check-label inline-block dark:text-white-800 cursor-pointer" for="{{ $category->id }}">
                                    {{ $category->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full mt-5">{{ __('Filter') }}</button>
                </form>
            </nav>

            <div class="flex-1 min-w-0 overflow-auto">
                <div class="grid grid-cols-3 gap-4 p-10">
                    @foreach($lots as $lot)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $lot->title }}</div>
                                @if($lot->description)
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
                    @endforeach
                </div>
                <div class="p-10 content-center">
                    {{ $lots->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
