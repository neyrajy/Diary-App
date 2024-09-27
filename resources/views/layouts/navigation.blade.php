<nav x-data="{ open: false }" class="navbar-custom border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <ul style="padding-top:12px;" class=" navbar-nav mr-auto">
                        @if(Auth::check())
                            @if(Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('superadmin.dashboard')}}">Super Admin's Dashboard</a>
                            </li>                            
                            @elseif(Auth::user()->role_id == 2)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('admin.dashboard')}}">Admin's Dashboard</a>
                            </li>
                            @elseif(Auth::user()->role_id == 3)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('manager.dashboard')}}">Manager's Dashboard</a>
                            </li>
                            @elseif(Auth::user()->role_id == 4)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('parent.dashboard')}}">Parent's Dashboard</a>
                            </li>
                            @elseif(Auth::user()->role_id == 5)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('teacher.dashboard')}}">Teacher's Dashboard</a>
                            </li>
                            @elseif(Auth::user()->role_id == 6)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('driver.dashboard')}}">Driver's Dashboard</a>
                            </li>
                            @elseif(Auth::user()->role_id == 7)
                            <li class="nav-item">
                                <a class="nav-link menu-item" href="{{ route('staff.dashboard')}}">Staff's Dashboard</a>
                            </li>
                        @endif
                    @endif
                </ul></div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center btn btn-success">
                            <span class="mr-2">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Settings Dropdown -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="dropdown-item">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::check())
                @if(Auth::user()->role_id == 1)
                    <x-responsive-nav-link :href="route('superadmin.dashboard')" :active="request()->routeIs('superadmin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role_id == 2)
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role_id == 3)
                    <x-responsive-nav-link :href="route('manager.dashboard')" :active="request()->routeIs('manager.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role_id == 4)
                    <x-responsive-nav-link :href="route('parent.dashboard')" :active="request()->routeIs('parent.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('parent.fees')" :active="request()->routeIs('parent.fees')">
                        {{ __('Fees') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('parent.events')" :active="request()->routeIs('parent.events')">
                        {{ __('Events') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('parent.messages')" :active="request()->routeIs('parent.messages')">
                        {{ __('Messages') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('parent.notifications')" :active="request()->routeIs('parent.notifications')">
                        {{ __('Notifications') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role_id == 5)
                    <x-responsive-nav-link :href="route('teacher.dashboard')" :active="request()->routeIs('teacher.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role_id == 6)
                    <x-responsive-nav-link :href="route('driver.dashboard')" :active="request()->routeIs('driver.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role_id == 7)
                    <x-responsive-nav-link :href="route('staff.dashboard')" :active="request()->routeIs('staff.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @endif
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
