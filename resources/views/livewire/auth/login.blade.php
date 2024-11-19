<div class="flex min-h-screen bg-white">
    <!-- Bagian Form Login -->
    <div class="flex flex-col justify-center px-8 py-12 lg:px-12 w-full max-w-lg">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-12 w-auto" src="img/logo-intra-new.svg" alt="Logo Intra">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                LOGIN
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Silakan masuk untuk mengakses web SMPL Intra
            </p>
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
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.5 5h-6l-1.5-5h5zM5 20a1 1 0 011-1h12a1 1 0 011 1H5zM12 7a3 3 0 100-6 3 3 0 000 6zM12 12c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z" />
                            </svg>
                        </div>
                        <input id="nrp" name="nrp" type="text" placeholder="Masukan NRP"
                            wire:model="form.nrp" required
                            class="block w-full pl-10 rounded-md border-gray-300 py-2 text-gray-900 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2 relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3C6.48 3 2 9 2 12s4.48 9 10 9 10-6 10-9-4.48-9-10-9zm0 12a3 3 0 100-6 3 3 0 000 6z" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="{{ $showPassword ? 'text' : 'password' }}"
                            placeholder="Masukan Password" wire:model="form.password" required
                            class="block w-full pl-10 rounded-md border-gray-300 py-2 text-gray-900 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <button type="button" wire:click="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            @if ($showPassword)
                                <!-- Icon Mata Terbuka -->
                                <i class='bx bxs-show'></i>
                            @else
                                <!-- Icon Mata Tertutup -->
                                <i class='bx bxs-hide'></i>
                            @endif
                        </button>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bagian Gambar -->
    <div class="hidden lg:block lg:w-[68%] bg-gray-100 p-3">
        <img src="img/foto-industri.jpg" alt="tidak ada foto" class="h-full w-full object-cover rounded"
            style="height: 97vh; background-image: url('https://i.pinimg.com/736x/25/06/a0/2506a0a89436befedd606ca50815273f.jpg'); background-size: cover; background-position: center;"">
    </div>
</div>
