<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Lots"
        :active="Str::startsWith(request()->route()->uri(), 'lots')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="All"
            href="{{ route('lots.index') }}"
            :active="request()->routeIs('lots.index')"
        />
        <x-sidebar.sublink
            title="Create new"
            href="{{ route('lots.create') }}"
            :active="request()->routeIs('lots.create')"
        />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Categories"
        :active="Str::startsWith(request()->route()->uri(), 'categories')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="All"
            href="{{ route('categories.index') }}"
            :active="request()->routeIs('categories.index')"
        />
        <x-sidebar.sublink
            title="Create new"
            href="{{ route('categories.create') }}"
            :active="request()->routeIs('categories.create')"
        />
    </x-sidebar.dropdown>

</x-perfect-scrollbar>
