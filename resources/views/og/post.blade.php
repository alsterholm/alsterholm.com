<x-layout.document>
    <div class="relative border-2 border-gray-800 w-[1200px] h-[630px] p-12 overflow-hidden">
        @foreach (range(0, random_int(4, 8)) as $i)
            <div
                class="z-0 absolute {{ Arr::random(['bg-rose-400', 'bg-rose-500', 'bg-rose-600', 'bg-rose-700']) }}"
                style="
                    width: {{ random_int(15, 30) }}%;
                    height: {{ random_int(15, 30) }}%;
                    transform: rotate({{ random_int(5, 45)}}deg);
                    top: {{ random_int(0, 90) }}%;
                    left: {{ random_int(0, 90) }}%;
                    opacity: {{ random_int(10, 40) }}%;
                "
            ></div>
        @endforeach
        <div class="flex flex-col h-full items-center justify-center text-center space-y-8">
            <div class="relative inline-block">
                <div class="absolute -left-[2%] w-[104%] -top-[2%] h-[104%] z-10 bg-rose-400 rotate-[-2deg]"></div>
                <h1 class="relative z-20 bg-rose-600 text-5xl text-white font-[Alata] py-4 px-8 font-bold">
                    {{ $post->title }}
                </h1>
            </div>
            <div class="text-4xl text-slate-600 font-black">
                Andreas Alsterholm
            </div>
        </div>
    </div>
</x-layout.document>
