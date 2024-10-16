<!doctype html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    {{-- <script src="{{ asset('assets/js/init-alpine.js') }}"></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{-- Sidebar --}}
        @include('livewire.admin.sidebar')

        <div class="flex flex-col flex-1 w-full">

            {{-- header --}}
            @include('livewire.admin.header')

            {{-- main --}}
            <main class="h-full overflow-y-auto">
                {{-- content --}}
                <div class="container px-6 mx-auto grid">
                    {{ $slot }}
                </div>

                {{-- footer --}}
                @include('livewire.admin.footer')
            </main>
        </div>
    </div>

    <livewire:scripts />
</body>

</html>
