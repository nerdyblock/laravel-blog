<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full flex lg:inline-flex lg:w-32 text-left">{{ isset($currentCategory) ? ucwords($currentCategory->name) : "Categories" }}</button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('category')) }}" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category) 
        <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}" 
            :active="isset($currentCategory) && $currentCategory->id === $category->id">{{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>