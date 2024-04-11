<div class="text-slate-500" x-data="{ showTooltip: false }">
    <div
        class="hidden md:block text-sm font-normal whitespace-nowrap bg-black dark:bg-white text-white dark:text-black px-2 py-1 mt-1"
        x-anchor="$refs.button"
        x-show="showTooltip"
        x-cloak
    >
        <span x-text="darkMode ? 'Disable' : 'Enable'"></span> dark mode
    </div>

    <button
        class="relative"
        x-on:click="darkMode = !darkMode"
        x-on:mouseenter="showTooltip = true"
        x-on:mouseleave="showTooltip = false"
        x-ref="button"
    >

        <div class="flex justify-center items-center space-x-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-6" x-show="!darkMode" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-6" x-show="darkMode" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </div>

            <div class="md:hidden">
                <span x-text="darkMode ? 'Disable' : 'Enable'"></span> dark mode
            </div>
        </div>
    </button>
</div>
