<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @include('components.home-nav')
        <div class="py-4 mt-10 min-h-screen flex items-center pt-5 px-3 lg:px-0 sm:pt-0 bg-stone-100">
            
            <div class="lg:w-1/3  items-center  bg-white mx-auto rounded-lg shadow-lg py-5 pb-4">
                <!--<div class="hidden lg:flex items-center">
                    <img src="{{asset('images/components/elibrary2.png')}}" class=" lg:w-1/2 mx-auto" alt="">
                </div>-->
    
                <div class=" bg-white  flex items-center">
                    <div class="w-full mx-auto sm:max-w-md  px-6  overflow-hidden ">
                        
                            <a href="/">
                                <x-application-logo class=" fill-current text-gray-500" />
                            </a>
                        
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>