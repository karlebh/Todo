<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none overflow-x-hidden">
    <div id="app">
        <nav class="bg-blue-900 shadow mb-8 py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center">
                    <div class="w-2/5"></div>
                    <div class="flex justify-center mr-6 w-1/5">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>


                    </div>
                    
                    <div class="w-2/5 absolute right-0">
                        <h4 class="mx-auto w-64 text-white font-semibold ">
                            <a href="{{ route('todo.create') }}">
                                Create New Todo
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </nav>

        <div class="text-green-700 text-lg">
            {{ $message ?? ""}}
        </div>

        @yield('content')


       <div class="mx-auto px-6 sm:px-0 bg-blue-900 py-10">
            <div class="flex items-center justify-center">

                <div class="">
                    <h4 class="mx-auto w-64 text-white text-center font-semibold">
                        Todo Inc. &copy {{ Date('Y') }}
                        {{-- <span id="date"></span>
                        <script>
                            document.getElementById('date').innerHTML = new Date().getFullYear();
                        </script> --}}
                    </h4>

                </div>
             

            </div>
        </div>
    </div>
</body>
    <script>
        window.addEventListener('scroll', onScroll);

           function onScroll(){

            if(window.pageYOffset < 0){
                return;
                }

            if(Math.abs(window.pageYOffset - this.lastScrollPosition) < 90){
                return;
                }
            this.showNav = window.pageYOffset < this.lastScrollPosition;
            this.lastScrollPosition = window.pageYOffset;
            }

    </script>
</html>
