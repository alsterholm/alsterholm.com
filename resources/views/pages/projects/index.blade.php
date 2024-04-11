<x-layout.base>
    <x-heading>Projects</x-heading>

    <div class="space-y-8">
        <div class="leading-loose text-slate-800 dark:text-slate-200 space-y-4">
            <div>
                <p>
                    This page contains a selection of the projects I am currently working on, as well as projects I have worked on in the past.
                </p>
            </div>
        </div>

        <div class="space-y-12">
            <div class="space-y-4">
                <x-heading.h2>
                    Current endeavors
                </x-heading.h2>

                <p class="leading-loose">
                    There's a <em class="font-bold">bunch</em> of stuff brewing right now, but I don't have anything
                    to share just yet. As soon as I've come a tiny bit further everything will be built out in the open!
                    Hang in there!
                </p>
            </div>

            <div class="space-y-4">
                <x-heading.h2>
                    Things of the past
                </x-heading.h2>

                <x-project
                    name="Fargrond"
                    startYear="2015"
                    endYear="2018"
                    :tags="['PHP', 'Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe', 'Echo']"
                >
                    <p>
                        Fargrond was a text-based role-playing game set in a fantasy world. At its peak,
                        the game had roughly 2,000 active users among which 500 were paying subscribers.
                        It had several betas throughout 2015 and 2016 and was finally launched in September
                        2017.
                    </p>

                    <p>
                        The game was deployed on DigitalOcean using Laravel Forge and Envoyer. Payments
                        where handled via Stripe (utilizing Laravel Cashier).
                    </p>
                </x-project>
            </div>
        </div>
    </div>
</x-layout.base>
