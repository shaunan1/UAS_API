<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel App') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo atau Nama Aplikasi -->
            <a href="{{ url('/') }}" class="text-lg font-bold">{{ config('app.name', 'Laravel App') }}</a>

            <!-- Menu Navigasi -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>
                <a href="{{ route('tasks.index') }}" class="hover:underline">Tasks</a>
                <a href="{{ route('teams.index') }}" class="hover:underline">Teams</a>

                <!-- User Authentication Menu -->
                @auth
                <div class="relative group">
                    <button class="flex items-center text-sm font-medium text-white focus:outline-none">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 011.414 0L10 11.586l3.293-3.879a1 1 0 011.414 1.415l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="absolute right-1  w-48 bg-white rounded-md shadow-lg hidden group-hover:block z-20">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:underline">Register</a>
                    @endif
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
