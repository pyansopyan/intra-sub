<div>
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 min-h-full">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Intra-sub
            </a>
            <a href="/user">User</a>
            <ul class="mt-6">
                <li class=" px-6 py-3 {{ request()->routeIs('welcome') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <span class="absolute inset-y-0 left-0 w-1 bg-white-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                    <a href="/" wire:navigate
                        class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                @can('manageUser')
                    <li class="relative px-6 py-3 {{ request()->is('user*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 "
                            href="{{ route('user.index') }}" wire:navigate>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.31 0-8 1.67-8 5v1h16v-1c0-3.33-4.69-5-8-5z"/>
                            </svg>
                            <span class="ml-4">User</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <ul>
                @can('manageRole')
                    <li class="relative px-6 py-3 {{ request()->is('role*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('role.index') }}" wire:navigate>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C7.03 2 2 3.5 2 7v6c0 3.5 5.03 5 10 5s10-1.5 10-5V7c0-3.5-5.03-5-10-5zm0 16c-2.84 0-5.64-.62-7.5-1.74v-5.26c1.86 1.12 4.66 1.74 7.5 1.74s5.64-.62 7.5-1.74v5.26C17.64 17.38 14.84 18 12 18z"/>
                            </svg>
                            <span class="ml-4">Role</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('managePermission')
                    <li class="relative px-6 py-3 {{ request()->is('permissions*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('permission.index') }}" wire:navigate>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2a5 5 0 0 1 5 5v3h-1a5 5 0 1 0-10 0v5h12v2H6a2 2 0 0 1-2-2V9a5 5 0 0 1 5-5zm5 13h2v4h-2z"/>
                            </svg>
                            <span class="ml-4">Permission</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageDepartement')
                    <li class="relative px-6 py-3 {{ request()->is('departement*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('departement.index') }}" wire:navigate>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 3h16v18H4V3zm3 2v14h2V5H7zm8 0v14h2V5h-2zm-6 6v8h2v-8H9zm4 0v8h2v-8h-2z" />
                            </svg>
                            <span class="ml-4">Departement</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageBagian')
                    <li class="relative px-6 py-3 {{ request()->is('bagian*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('bagian.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 12H8M16 16H8M16 8H8" />
                                <path d="M4 6V18c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6H4z" />
                            </svg>
                            <span class="ml-4">Bagian</span>
                        </a>
                    </li>
                @endcan
            </ul>


            <ul>
                @can('manageJabatan')
                    <li class="relative px-6 py-3 {{ request()->is('jabatan*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('jabatan.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 2C10.34 2 9 3.34 9 5c0 1.66 1.34 3 3 3s3-1.34 3-3c0-1.66-1.34-3-3-3zm-1 9c-5.52 0-10 3.58-10 8v1h20v-1c0-4.42-4.48-8-10-8z" />
                            </svg>
                            <span class="ml-4">Jabatan</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageTaskStatus')
                    <li class="relative px-6 py-3 {{ request()->is('task-status*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('task-status.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 2L2 7h20L12 2zm0 4l10 5-10 5L2 11l10-5z" />
                                <path d="M2 17h20M2 22h20" />
                            </svg>
                            <span class="ml-4">Task Status</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageTaskType')
                    <li class="relative px-6 py-3 {{ request()->is('task-type*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('task-type.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 3h6v4H9V3zm0 8h6v4H9v-4zm0 8h6v4H9v-4z" />
                            </svg>
                            <span class="ml-4">Task Type</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageProjectStatuses')
                    <li class="relative px-6 py-3 {{ request()->is('statuses*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('project-statuses.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2 4 4 8-8 2 2-10 10-4-4z" />
                            </svg>
                            <span class="ml-4">Project Statuses</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <ul>
                @can('manageTaskPriorities')
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('priorities.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <span class="ml-4">Task Priorities</span>
                        </a>
                    </li>
                @endcan
            </ul>

            {{-- <ul>
                <li class="relative px-6 py-3">
                    <form action="{{route('logout')}}" method="POST" wire:click.prevent>
                        @csrf
                        <button type="submit" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2h2a2 2 0 012 2v1"></path>
                            </svg>
                            <span class="ml-4">Logout</span>
                        </button>
                    </form>
                </li>
            </ul> --}}

        </div>
    </aside>
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    </div>
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Intra-sub
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                        href="index.html">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="forms.html">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        <span class="ml-4">Master User</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
