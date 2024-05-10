@props(['title' => 'Andreas Alsterholm'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        darkMode: false,
        init() {
            this.darkMode = document.documentElement.classList.contains('dark')

            this.$watch('darkMode', (value) => {
                document.documentElement.classList.toggle('dark')

                if (document.documentElement.classList.contains('dark')) {
                    localStorage.theme = 'dark'
                } else {
                    localStorage.theme = 'light'
                }
            })
        },
    }"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script>
            let choseDark = localStorage.theme === 'dark';
            let prefersDark = !('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (choseDark || prefersDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=alata:400" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=zilla-slab:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

        <link rel="icon" type="image/png" href="/favicon.png">

        @vite('resources/css/app.css')

        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/anchor@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>

    <body class="font-['Zilla_Slab'] text-slate-950 dark:text-slate-100 antialiased bg-white dark:bg-slate-900 py-4 text-justify transition-colors">
        <div class="max-w-4xl mx-auto md:pt-8">
            <div class="px-4">
                <div class="flex flex-col md:flex-row md:gap-12">
                    <x-sidebar />

                    <main {{ $attributes->class('flex-1 text-lg min-h-[75vh]') }}>
                        {{ $slot }}
                    </main>
                </div>

                <x-footer />
            </div>
        </div>
    </body>
</html>
