@props(['trigger'])

<div x-data="{show: false}" @click.outside="show = false" class="flex-1">

    {{--trigger--}}
    <div x-on:click="show = !show">
        {{ $trigger }}
    </div>

    {{--links--}}
    <div x-show="show" class="py-2 absolute w-full bg-gray-100 rounded-xl mt-2 z-50 overflow-auto max-h-50" style="display: none">

        {{ $slot }}

    </div>
</div>