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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Detail') }}
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                                {{ __("You're logged innn!") }}
                            </div> --}}
                        </div>
                        {{-- <a href="{{ route('dashboard') }}"><button class="btn btn-neutral mt-10 mb-6">Dashboard</button></a> --}}
                        <div class="overflow-x-auto">
                            <table class="table">
                              <!-- head -->
                              <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Cover</th>
                                  <th>Publisher</th>
                                  <th>Authors</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- row 1 -->
                                <tr>
                                  <td>{{ $book->title }}</td>
                                  <td><img src="{{ asset('storage') }}/{{ $book->cover }}" width="150px" height="150px"></td>
                                  <td>{{ $book->publisher->name_publisher }}</td>
                                  <td>{{ $book->authors->name_authors }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
            
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            
            <script>
                // Auto-hide success message after 5 seconds
                $(document).ready(function(){
                    setTimeout(function(){
                        $("#success-message, #remove-message, #update-message").fadeOut("slow", function(){
                            $(this).remove();
                        });
                    }, 3000); // 5000 milliseconds = 5 seconds
                });
            </script>            
            </main>
        </div>
    </body>
</html>
