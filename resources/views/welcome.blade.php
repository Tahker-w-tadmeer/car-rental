<x-basic>
    <div class="bg-gray-50 h-screen">
        <main>
            <!-- Hero section -->
            <div class="relative isolate overflow-hidden">
                <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]" aria-hidden="true">
                    <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-20" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>
                </div>
                <div class="mx-auto max-w-7xl px-6 pb-24 pt-10 sm:pb-40 lg:flex lg:px-8 lg:pt-40">
                    <div class="mx-auto max-w-2xl flex-shrink-0 lg:mx-0 lg:max-w-xl lg:pt-8">
                        <h1 class="mt-10 text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Unlock your next adventure!</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-700">From swift reservations to a diverse range of well-maintained vehicles, our platform offers the perfect blend of convenience and choice, ensuring every journey is as enjoyable as the destination itself.</p>
                        <div class="mt-10 flex items-center gap-x-6">
                            <a href="/dashboard" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                                Rent a car
                            </a>
                        </div>
                    </div>
                    <div class="mx-auto mt-16 flex max-w-2xl sm:mt-24 lg:ml-10 lg:mrs-0 lg:mt-0 lg:max-w-none lg:flex-none xl:ml-32">
                        <div class="max-w-3xl flex-none sm:max-w-5xl lg:max-w-none">
                            <img src="{{ asset("images/img.png") }}" alt="Background with car"
                                 class="w-[55rem] object-none object-right rounded-md bg-white/5 shadow-2xl ring-1 ring-white/10">
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer aria-labelledby="footer-heading" class="relative">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="mx-auto max-w-7xl px-6 pb-8 lg:px-8">
                <div class="border-t border-white/10 md:flex md:items-center md:justify-between">
                    <p class="mt-8 text-xs leading-5 pt-6 text-gray-600 md:order-1 md:mt-0">
                        &copy; 2023 Tahkeer w Tadmeer, Inc. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</x-basic>
