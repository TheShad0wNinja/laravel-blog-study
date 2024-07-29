<!DOCTYPE HTML>

<head>
    <title>Laravel From Scratch Blog</title>
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 inline-flex items-center">
                @guest
                    <a href="/login" class="text-xs font-bold uppercase">Login</a>
                    <a href="/register" class="ml-3 text-xs font-bold uppercase">Register</a>
                @endguest

                @auth
                    <p class="font-semibold mr-2">
                        Welcome, {{ auth()->user()->name }}
                    </p>

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen=true"
                            class="inline-flex items-center justify-center text-sm font-medium transition-colors bg-white border rounded-full p-1 text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none ">
                            <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}"
                                class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                        </button>

                        <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                            x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                            x-transition:enter-end="translate-y-0"
                            class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                            <div
                                class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                                <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                <a href="/admin/posts"
                                    class="relative flex select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                    <x-icon name="admin" class="w-4 h-4 mr-2" />
                                    <span>Admin</span>
                                </a>
                                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                <form action="/logout">
                                    <button type="submit"
                                        class="relative flex w-full select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                        <x-icon name="logout" class="w-4 h-4 mr-2" />
                                        <span>Log out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth


                <a href="#"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
