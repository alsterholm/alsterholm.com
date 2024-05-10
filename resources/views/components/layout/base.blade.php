@props(['title' => 'Andreas Alsterholm'])

<x-layout.document :$title>
    <div class="py-4">
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
    </div>
</x-layout.document>
