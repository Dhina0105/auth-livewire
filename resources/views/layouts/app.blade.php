<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auth Livewire</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900">
    <nav class="p-4 bg-white shadow">
        <div class="max-w-4xl mx-auto flex justify-between">
            <a href="/" class="font-bold">Nutz Interview</a>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="mr-3">Dashboard</a>
                    <a href="{{ route('posts')}}" class="mr-3">Create Post</a>
                    <a href="{{ route('change-password') }}" class="mr-3">Change Password</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="text-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-3">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-6">
        {{ $slot ?? null }}
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
