<div x-data="{ menu: false }" class="bg-gray-900">
    <!-- Header -->
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only"><?= env("APP_NAME") ?></span>
                    <img class="h-12 w-auto" src="/dist/logo.svg" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button @click="menu=true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="text-sm font-semibold leading-6 text-gray-50">Product</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-50">Features</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-50">Marketplace</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-50">Company</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="/login" class="text-sm font-semibold leading-6 text-gray-50">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>

        <div class="lg:hidden" x-show="menu" role="dialog" aria-modal="true">
            <div class="fixed inset-0 z-50"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto
             bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only"><?= env("APP_NAME") ?></span>
                        <img class="h-12 w-auto" src="/dist/logo.svg" alt="">
                    </a>
                    <button @click="menu=false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                        </div>
                        <div class="py-6">
                            <a href="/login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero section -->
        <div class="relative isolate overflow-hidden">
            <svg class="absolute inset-0 -z-10 h-full w-full stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
                <defs>
                    <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-800/20">
                    <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
            </svg>
            <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]" aria-hidden="true">
                <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-20" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>
            </div>
            <div class="mx-auto max-w-7xl px-6 pb-24 pt-10 sm:pb-40 lg:flex lg:px-8 lg:pt-40">
                <div class="mx-auto max-w-2xl flex-shrink-0 lg:mx-0 lg:max-w-xl lg:pt-8">
                    <h1 class="mt-10 text-4xl font-bold tracking-tight text-white sm:text-6xl">Unlock your next adventure with our seamless car rental experience!</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-300">From swift reservations to a diverse range of well-maintained vehicles, our platform offers the perfect blend of convenience and choice, ensuring every journey is as enjoyable as the destination itself.</p>
                    <div class="mt-10 flex items-center gap-x-6">
                        <a href="/login" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                            Rent a car
                        </a>
                    </div>
                </div>
                <div class="mx-auto mt-16 flex max-w-2xl sm:mt-24 lg:ml-10 lg:mrs-0 lg:mt-0 lg:max-w-none lg:flex-none xl:ml-32">
                    <div class="max-w-3xl flex-none sm:max-w-5xl lg:max-w-none">
                        <img src="/dist/images/img.png" alt="Background with car"
                             class="w-[76rem] object-contain object-left rounded-md bg-white/5 shadow-2xl ring-1 ring-white/10">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer aria-labelledby="footer-heading" class="relative">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-4 lg:px-8">
            <div class="border-t border-white/10 pt-8 md:flex md:items-center md:justify-between">
                <p class="mt-8 text-xs leading-5 text-gray-400 md:order-1 md:mt-0">
                    &copy; 2023 Tahkeer w Tadmeer, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</div>
