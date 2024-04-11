<?php
    use App\Models\Book;
    use App\Models\Post;
    use Illuminate\View\View;

    use function Laravel\Folio\render;

    render(function (View $view) {
        $view->with('latestBlogPost', Post::last());
        $view->with('currentBook', Book::current());
    });
?>

<x-layout.base class="space-y-4">
    <x-heading>Hi!</x-heading>

    <div class="space-y-16">
        <div class="leading-loose text-slate-800 dark:text-slate-200 space-y-4">
            <p>
                Glad to have you here!
            </p>

            <p>
                My name is Andreas, I'm a software engineer working as a tech lead for a Swedish company called
                <x-link href="https://mygizmo.se" target="_blank">MyGizmo</x-link>. I'm passionate about Laravel,
                Livewire, <x-link :href="url('/books')">fantasy novels</x-link> and a bunch of other things.
            </p>

            <p>
                I'm a father of two wonderful girls, Celia and Isolde, aged
                {{ floor(Date::parse('2020-02-02')->diffInYears()) }} and
                {{ floor(Date::parse('2023-02-07')->diffInYears()) }}.
            </p>

            <p>
                Feel free to browse around, or check below to find my latest blog post, what book I'm currently reading,
                and a form where you can submit your email to a newsletter that may exist one day.
            </p>
        </div>

        @if ($latestBlogPost)
            <div class="space-y-4">
                <x-heading.h2>
                    Latest blog post
                </x-heading.h2>

                <div class="space-y-8">
                    <x-blog.preview :post="$latestBlogPost" />

                    <a href="{{ url('/blog') }}" class="relative inline-block font-bold text-rose-600 dark:text-violet-400 hover:text-white group transition">
                        <div class="absolute z-10 h-full w-[110%] top-0 -left-[5%] bg-rose-600 dark:bg-violet-500 scale-x-0 group-hover:scale-x-100 transition origin-left"></div>
                        <div class="relative z-20 flex items-center space-x-2">
                            <div>View more blog posts</div>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-0.5">
                                <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        @endif

        @if ($currentBook)
            <x-books.current :book="$currentBook" />

            <a href="{{ url('/books') }}" class="relative inline-block font-bold text-rose-600 dark:text-violet-400 hover:text-white group transition">
                <div class="absolute z-10 h-full w-[110%] top-0 -left-[5%] bg-rose-600 dark:bg-violet-500 scale-x-0 group-hover:scale-x-100 transition origin-left"></div>
                <div class="relative z-20 flex items-center space-x-2">
                    <div>View previously read books</div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-0.5">
                        <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        @endif

        <x-newsletter.form />
    </div>
</x-layout.base>
