<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="img/logo-intra-new.svg" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">LOGIN</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" wire:submit="login" method="POST">
            @csrf
            @if (session()->has('error'))
            <div class="text-red-600 text-sm mb-2">
                {{ session('error') }}
            </div>
        @endif
            <div>
                <label for="nrp" class="block text-sm font-medium leading-6 text-gray-900">NRP</label>
                <div class="mt-2 relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.5 5h-6l-1.5-5h5zM5 20a1 1 0 011-1h12a1 1 0 011 1H5zM12 7a3 3 0 100-6 3 3 0 000 6zM12 12c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z" />
                        </svg>
                    </div>
                    <input id="nrp" name="nrp" type="text" placeholder="Masukan nrp" autocomplete="Masukan NRP" wire:model="form.nrp" required class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2 relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 9 2 12s4.48 9 10 9 10-6 10-9-4.48-9-10-9zm0 12a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>

                    </div>
                    <input id="password" name="password" type="password" placeholder="Masukan Password" wire:model="form.password" autocomplete="current-password" required class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>
    </div>
</div>
