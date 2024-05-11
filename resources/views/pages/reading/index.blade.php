<?php
    use App\Models\Book;
    use Illuminate\View\View;

    use function Laravel\Folio\render;

    render(function (View $view) {
        $view->with('currentBook', Book::current());
        $view->with('books', Book::finished()->sortByDesc(fn (Book $book) => $book->started_at));
    });
?>

<x-layout.base class="space-y-12">
    <div>
        <x-heading>Reading</x-heading>

        <div class="leading-loose text-slate-800 dark:text-slate-200 space-y-4">
            <p>
                One of my New Year's resolutions for 2024 was that I would read every single day. As part of that, I started
                tracking what I read. I used to do that in a Google Spreadsheet, but figured I might as well keep it public in
                case anyone gets inspired.
            </p>

            <p>
                As you can tell from the list below, I read basically exclusively fantasy, with an exception for the occasional
                science fiction every now and then.
            </p>

            <p>
                Do you want to talk about any of the books below, have any tips or want some recommendations?
                Please don't hestitate to <x-link :href="url('/contact')">reach out!</x-link>
                ☺️
            </p>
        </div>
    </div>

    @if ($currentBook)
        <x-books.current :book="$currentBook" />
    @endif

    <div class="space-y-4">
        <x-heading.h2>
            Previous books
        </x-heading.h2>

        <div class="space-y-8">
            @foreach ($books as $book)
                <x-books.previous.book :$book />
            @endforeach
        </div>
    </div>
</x-layout.base>
