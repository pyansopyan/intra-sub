<div>
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 h-screen">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
                Intra-sub
            </a>
            <ul class="mt-6">
                <li
                    class=" px-6 py-3 {{ request()->routeIs('welcome') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <span class="absolute inset-y-0 left-0 w-1 bg-white-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                    <a href="/" wire:navigate
                        class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                        <i class="bx bxs-home" style="font-size: 20px;"></i>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                @can('manageUser')
                    <li
                        class="relative px-6 py-3 {{ request()->is('user*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 "
                            href="{{ route('user.index') }}" wire:navigate>
                            <i class='bx bxs-user' style="font-size: 20px;"></i>
                            <span class="ml-4">User</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <ul>
                @can('manageRole')
                    <li
                        class="relative px-6 py-3 {{ request()->is('role*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('role.index') }}" wire:navigate>
                            <i class='bx bxs-user-check' style="font-size: 24px;"></i>
                            <span class="ml-4">Role</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('managePermission')
                    <li
                        class="relative px-6 py-3 {{ request()->is('permissions*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('permission.index') }}" wire:navigate>
                            <i class='bx bxs-check-square' style="font-size: 20px;"></i>
                            <span class="ml-4">Permission</span>
                        </a>
                    </li>
                @endcan
            </ul>

            
            <ul>
                @can('manageDepartement')
                    <li
                        class="relative px-6 py-3 {{ request()->is('departement*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('departement.index') }}" wire:navigate>
                            <i class='bx bxs-user-badge' style="font-size: 21px;"></i>
                            <span class="ml-4">Departement</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageBagian')
                    <li
                        class="relative px-6 py-3 {{ request()->is('bagian*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('bagian.index') }}" wire:navigate>
                            <i class='bx bxs-user-pin' style="font-size: 20px;"></i>
                            <span class="ml-4">Bagian</span>
                        </a>
                    </li>
                @endcan
            </ul>


            <ul>
                @can('manageJabatan')
                    <li
                        class="relative px-6 py-3 {{ request()->is('jabatan*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('jabatan.index') }}" wire:navigate>
                            <i class='bx bxs-user-rectangle' style="font-size: 20px;"></i>
                            <span class="ml-4">Jabatan</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageTaskStatus')
                    <li
                        class="relative px-6 py-3 {{ request()->is('task-status*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('task-status.index') }}" wire:navigate>
                            <i class='bx bxs-check-circle' style="font-size: 20px;"></i>
                            <span class="ml-4">Task Status</span>
                        </a>
                    </li>
                @endcan
            </ul>

            <ul>
                @can('manageTaskType')
                    <li
                        class="relative px-6 py-3 {{ request()->is('task-type*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
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
                    <li
                        class="relative px-6 py-3 {{ request()->is('statuses*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}">
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
                    <li
                        class="relative px-6 py-3 {{ request()->is('priorities*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}"">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('priorities.index') }}" wire:navigate>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <span class="ml-4">Task Priorities</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <ul>
                @can('manageActivities')
                    <li
                        class="relative px-6 py-3 {{ request()->is('activities*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}"">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('activities.index') }}" wire:navigate>
                            <i class='bx bx-walk' style="font-size: 22px;"></i>
                            <span class="ml-4">Activities</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <ul>
                <ul>
                    @can('manageProject')
                        <li
                            class="relative px-6 py-3 {{ request()->is('project*') ? 'text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200' }}"">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('project.index') }}" wire:navigate>
                                <i class='bx bxl-product-hunt' style="font-size: 20px"></i>
                                <span class="ml-4">Project</span>
                            </a>
                        </li>
                    @endcan
                </ul>
                <ul>
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
