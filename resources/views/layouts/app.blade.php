<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @notifyCss
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js',])
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
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow w-full">
            <div class="bg-white shadow flex justify-between items-center border-b">
                <div class="bg-white flex justify-center items-center border-r" style="width: 8%;">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center px-3">
                        <a href="{{ route('dashboard') }}" class="flex justify-center items-center">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            <span class="font-semibold"> {{ __('Etudiant') }}</span>
                        </a>
                    </div>
                </div>
                <div class="flex justify-between items-center py-5 px-0" style="width:75%">
                    {{ $header }}
                </div>
                <div class="mr-4 hover:cursor-pointer">
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
            </div>
        </header>
        @endif

        <!-- Page Content -->
        @if (isset($content))
        <main class="relative">
            <div class="flex justify-between">
                <div class="  w-auto border-r" style="width: 8%;">
                    @include('layouts.sidenave')
                </div>
                <div class="py-10" style="width:75%">
                    <div class="">
                        {{ $content }}
                    </div>
                </div>
                <div style="width: 56px;"></div>
            </div>
        </main>
        @endif
        <!-- Livewire fullpage component -->
        <div>
            {{ $slot }}
        </div>
    </div>
    <div>
        @if (session()->has('success'))
        <div class="flex items-center text-center text-xl p-6 w-auto rounded shadow-xl" style="height: 50px; background-color:lightgreen; position:fixed; bottom:0; left:50%; transform:translate(-50%);">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <script src="{{ asset('js/modal.js') }}"></script>
    <x-notify::notify />
    @notifyJs
    @livewire('livewire-ui-modal')
    @livewireScripts
    @stack('script')
</body>

</html>