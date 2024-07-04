<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    @notifyCss

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet" defer>
    <!-- Custom styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" defer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js',])
    <!-- @vite(['resources/css/app.css','resources/css/mdb.min.css','resources/css/admin.css', 'resources/js/app.js','resources/js/mdb.min.js','resources/js/admin.js',]) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <style>
        /* Define the animation name and duration */
        .text-motion {
            animation: scroll-right-to-left 7s infinite;
        }

        /* Define the keyframes for the animation */
        @keyframes scroll-right-to-left {

            /* Start from the right edge of the container */
            0% {
                transform: translateX(0%);
            }

            /* End at the left edge of the container */
            100% {
                transform: translateX(-12%);
            }


        }

        @supports (scrollbar-color: hsl(240 100% 27%) hsl(240 100% 90%)) {
            * {
                scrollbar-color: hsl(0deg 90.95% 49.97%) hsl(0deg 0% 100%);
                scrollbar-width: thin;
            }
        }

        #laravel-notify>div>div {
            position: absolute;
            bottom: 25px;
            right: 25px;
        }
    </style>
</head>

<body class="font-sans antialiased h-full">

    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        @include('layouts.sidenav')
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="{{route('admin')}}">
                    <img src="{{ asset('img/logo.png') }}" alt="" loading="lazy" />
                    <div class="d-none d-md-flex input-group w-auto my-auto">
                        <span class=" border-0 text-lg">SGS</span>
                    </div>
                </a>
                <!-- Search form -->
                <!-- <form class="d-none d-md-flex input-group w-auto my-auto">
                     <input autocomplete="off" type="search" class="form-control rounded" placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
                     <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
                </form> -->

                @yield('header')
                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Some news</a></li>
                            <li><a class="dropdown-item" href="#">Another news</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Icon -->
                    <li class="nav-item">
                        <a class="nav-link me-3 me-lg-0" href="#">
                            <i class="fas fa-fill-drip"></i>
                        </a>
                    </li>
                    <!-- Icon -->
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>

                    <!-- Icon dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            @if(app()->getLocale() == 'en')
                            <i class="united kingdom flag m-0"></i>
                            @else
                            <i class="france flag"></i>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                @if(app()->getLocale() == 'en')
                                <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                                    <i class="fa fa-check text-success ms-2"></i></a>
                                @else
                                <a class="dropdown-item" href="#"><i class="france flag"></i>Français
                                    <i class="fa fa-check text-success ms-2"></i></a>
                                @endif
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}"><i class="united kingdom flag"></i>English</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', 'fr') }}"><i class="france flag"></i>Français</a>
                            </li>

                        </ul>
                        <!-- <select onchange="location = this.value;">
                            @foreach(config('laravellocalization.supportedLocales') as $localeCode => $properties)
                            <option value="{{ route('lang.switch', $localeCode) }}" {{ app()->getLocale() == $localeCode ? 'selected' : '' }}>
                                {{ $properties['native'] }}
                            </option>
                            @endforeach
                        </select> -->

                    </li>

                    <!-- Avatar -->
                    <div class="mr-0 hover:cursor-pointer">
                        @php
                        $fullName = Auth::user()->name;
                        $nameParts = explode(' ', trim($fullName));
                        $firstName = $nameParts[0];
                        $lastName = end($nameParts);
                        $initials = mb_substr($firstName, 0, 1) . mb_substr($lastName, 0, 1);
                        @endphp
                        <x-dropdown>
                            <x-slot name="trigger">
                                <div class="right-3 top-3 inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">{{ $initials }}</span>
                                </div>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-2 px-2 border-r font-semibold text-center">
                                    {{ Auth::user()->name }}
                                </div>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px" class="h-full">
        <div class="container pt-4">
            @yield('content')
        </div>
    </main>
    <script type="text/php">
        if (isset($pdf)) {
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $size = 10; 
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif"); 
        $width = $fontMetrics->get_text_width($text, $font, $size); 
        $x = ($pdf->get_width() - $width) / 2; 
        $y = $pdf->get_height() - 35; 
        $pdf->page_text($x, $y, $text, $font, $size);
    }
</script>
    <!-- MDB -->
    <script src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <script src="{{ asset('js/update_modal.js') }}"></script>
    <x-notify::notify />
    @notifyJs
    @livewire('livewire-ui-modal')
    @livewireScripts
    @stack('script')

</body>


</html>