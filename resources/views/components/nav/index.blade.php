<nav>
    <ul class="space-y-3 text-center md:text-left text-xl md:text-base">
        <x-nav.item :href="url('/blog')">
            Blog
        </x-nav.item>

        <x-nav.item :href="url('/projects')">
            Projects
        </x-nav.item>

        {{--<x-nav.item :href="url('/newsletter')">--}}
        {{--    Newsletter--}}
        {{--</x-nav.item>--}}

        <x-nav.item :href="url('/reading')">
            Reading
        </x-nav.item>

        <x-nav.item :href="url('/resume')">
            Resume
        </x-nav.item>

        <x-nav.item :href="url('/contact')">
            Contact
        </x-nav.item>
    </ul>

    <div class="flex justify-center mt-20 md:hidden">
        <x-dark-mode-toggle />
    </div>
</nav>
