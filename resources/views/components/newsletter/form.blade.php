<form class="space-y-2" action="{{ url('/newsletter') }}" method="POST">
    @csrf

    <label for="email" class="font-[Alata] text-sky-700 dark:text-fuchsia-300 font-bold text-base">
        Sign up for my hypothetical, future newsletter of awesomeness:
    </label>

    @if (session('success'))
        <div class="relative font-semibold">
            <div class="absolute z-10 -left-[2%] w-[104%] h-full bg-rose-400 dark:bg-violet-800 rotate-[-1.5deg]"></div>
            <div class="relative z-20 bg-rose-600 dark:bg-violet-500 text-white py-2 px-4 flex flex-col items-center">
                <p>You have successfully signed up. Thank you!</p>
                <p>Please check your inbox for a verification email.</p>
            </div>
        </div>
    @else
        <div class="py-4 space-y-4">
            <div class="relative">
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="relative z-20 peer w-full dark:bg-slate-950 border-4 border-rose-600 dark:border-violet-500 text-rose-700 dark:text-violet-200 px-2 py-1 placeholder:text-rose-300 dark:placeholder:text-violet-300/40 focus:outline-0"
                    placeholder="you@email.com"
                    required
                >
                <div class="absolute z-10 -left-[1%] -top-[2%] w-[102%] h-[104%] bg-rose-400 dark:bg-violet-800 rotate-[1deg] peer-focus:rotate-[-0.5deg] transition"></div>
            </div>

            @if (session('error'))
                <p class="text-red-700 dark:text-red-400 font-semibold">
                    Too many attempts - please try again later!
                </p>
            @endif
        </div>

        <div class="group relative inline-block">
            <div class="absolute z-10 -left-[5%] -top-[6%] w-[110%] h-[112%] bg-rose-400 dark:bg-violet-800 rotate-[-4deg] group-hover:rotate-[8deg] group-hover:bg-rose-300 dark:group-hover:bg-violet-700 transition"></div>
            <button class="relative z-20 bg-rose-600 dark:bg-violet-500 px-8 py-2 font-bold text-white group-hover:bg-rose-500 dark:group-hover:bg-violet-400 group-hover:text-rose-100 dark:group-hover:text-violet-50 transition">Submit</button>
        </div>
    @endif
</form>
