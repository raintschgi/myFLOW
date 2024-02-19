<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

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

        {{-- Tailwind: --}}
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}

        {{-- Bootstrap: --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        
    </head>
    
    <body style="background-color: white";>
        <div class="container col-sm-2 mt-3">
            <div class="d-flex d-column justify-content-center align-items-center" style="height: 100vh; background-color: #ededed ;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <img src="{{ asset('images/logo.png') }}">

                    <!-- Email or Username -->
                    <div class="form-group">
                        <x-input-label for="input_type" :value="__('Email / Benutzername')" />
                        <x-text-input id="input_type" class="form-control" type="text" name="input_type" :value="old('input_type')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="form-group">
                        <x-input-label for="password" :value="__('Kennwort')" />
            
                        <x-text-input   id="password" 
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}
            
                    {{-- <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}
            
                        <x-primary-button class="btn btn-primary mt-3 w-100">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            
        </div>
        
    </body>
    

