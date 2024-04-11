<x-layout.base>
    <x-heading>Resume</x-heading>

    <div class="space-y-8">
        <x-resume-list heading="Professional Experience">
            <x-resume-list.item role="Tech Lead" company="MyGizmo" start="2023">
                Leading a team of four, developing a project management platform for the construction industry.
                Full-stack development with Laravel, Livewire, Alpine and Tailwind.
            </x-resume-list.item>

            <x-resume-list.item role="Software Engineer" company="Acast" start="2021" end="2023">
                Worked with audio delivery systems, serving millions of users with large amounts of data.
                Back-end development with Node.js, infrastructure in AWS.
            </x-resume-list.item>

            <x-resume-list.item role="Software Engineer" company="Iteam" start="2017" end="2021">
                Software developer at a small consulting company, working with a wide variety of clients.
                Mainly working with JavaScript/TypeScript, including Node.js, React and Vue,
                as well as UX/UI work such as user research, interviewing, and UI design.
            </x-resume-list.item>

            <x-resume-list.item role="Co-founder & Software Engineer" company="Entowork" start="2016" end="2017">
                Co-founded the company Entowork together with three others, developing a gig economy platform.
                Built with PHP/Laravel and Vue.
            </x-resume-list.item>

            <x-resume-list.item role="Founder & Software Engineer" company="Rocketship" start="2015" end="2018">
                Developing and running a text-based browser game. Released in the fall of 2017 and had,
                at its peak, around 2000 monthly active users, and among them around 500 paying subscribers.
                Built with PHP/Laravel and Vue.
            </x-resume-list.item>

            <x-resume-list.item role="Software Engineer" company="Jobtip" start="2016" end="2016">
                Worked part-time while studying, developing a social media recruitment platform.
                Full-stack development with Laravel and Vue.
            </x-resume-list.item>

            <x-resume-list.item role="Software Engineer" company="Axis Communications" start="2015" end="2016">
                Worked on legacy systems while studying, mainly working on the company’s homegrown CRM system.
                Programming in Perl, PHP, Java, JavaScript (Angular 1.x, jQuery, Node.js).
            </x-resume-list.item>
        </x-resume-list>

        <x-resume-list heading="Education">
            <x-resume-list.item role="Bachelor of Science" company="Malmö University" start="2014" end="2017">
                <div class="space-y-4">
                    <p>
                        Computer Science
                    </p>

                    <div>
                        <h4 class="text-sky-800/80 dark:text-fuchsia-400/80 font-medium">Extra-curricular Activities</h4>
                        <ul class="list-['–'] ml-4">
                            <li class="pl-1">Chairman of the Board of Malmö University’s Mentorship Program</li>
                            <li class="pl-1">Student representative in the Program Council</li>
                            <li class="pl-1">Tutoring and Exercise Supervision</li>
                        </ul>
                    </div>
                </div>
            </x-resume-list.item>
        </x-resume-list>
    </div>
</x-layout.base>
