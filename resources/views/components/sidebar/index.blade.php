<div x-data="{ showSidebar: false }">
    <div class="relative mb-4 flex justify-between md:hidden z-50 dark:text-slate-500">
        <a href="{{ url('/') }}">
            <div class="text-base font-bold font-[Alata]">
                <div>
                    <div class="relative inline-block">
                        <div class="absolute h-[108%] w-[120%] -left-[10%] -top-[4%] bg-rose-600 dark:bg-violet-500 rotate-[1deg]"></div>
                        <div class="relative z-20 inline-block text-white rotate-[-2deg]">
                            Andreas
                        </div>
                    </div>
                </div>

                <div>
                    <div class="relative inline-block">
                        <div class="absolute h-[110%] w-[120%] -left-[10%] -top-[5%] bg-rose-400 dark:bg-violet-800 rotate-[-2deg]"></div>
                        <div class="relative z-20 inline-block text-white rotate-[1deg]">
                            Alsterholm
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <button x-on:click="showSidebar = !showSidebar">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8" x-show="!showSidebar">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8" x-show="showSidebar" x-cloak>
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <aside
        class="space-y-8 pt-40 md:pt-0 fixed md:static bg-white dark:bg-slate-900 top-0 left-0 w-full md:w-40 h-screen md:h-auto p-8 md:p-0 z-40 -translate-x-full md:translate-x-0 opacity-0 md:opacity-100 transition shadow-2xl md:shadow-none"
        x-bind:class="{ 'translate-x-0': showSidebar, 'opacity-100': showSidebar }"
    >
        <a href="{{ url('/') }}" class="group focus:outline-0 focus:opacity-70">
            <div class="space-y-4 hidden md:block">
                <div class="relative">
                    <div class="absolute z-10 -left-[2%] -top-[2%] w-[104%] h-[104%] bg-rose-400 dark:bg-violet-800 rotate-[4deg] xl:group-hover:rotate-[-6deg] transition"></div>
                    <img src="https://unavatar.io/twitter/arcadianalpaca" class="relative z-20 border-4 border-rose-600 dark:border-violet-500 rotate-[-2deg] xl:group-hover:rotate-[2deg] transition">
                </div>

                <div class="text-3xl font-bold font-[Alata] text-sky-900 dark:text-fuchsia-300 text-center md:text-left">
                    <div>
                        <div class="relative inline-block">
                            <div class="absolute h-[116%] w-[120%] -left-[10%] -top-[8%] bg-rose-600 dark:bg-violet-500 opacity-0 -translate-x-[50%] rotate-[-10deg] group-hover:rotate-[2deg] group-hover:opacity-100 group-hover:translate-x-0 transition pointer-events-none"></div>
                            <div class="relative z-20 inline-block group-hover:text-white group-hover:rotate-[-2deg] transition">
                                Andreas
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="relative inline-block">
                            <div class="absolute h-[120%] w-[120%] -left-[10%] -top-[6%] bg-rose-400 dark:bg-violet-800 opacity-0 translate-x-[50%] rotate-[8deg] group-hover:-rotate-[2deg] group-hover:opacity-100 group-hover:translate-x-0 transition pointer-events-none"></div>
                            <div class="relative z-20 inline-block group-hover:text-white group-hover:rotate-[1deg] transition">
                                Alsterholm
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <x-nav />
    </aside>
</div>
