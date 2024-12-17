@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                Home</a>
            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                Logout</a>
        @else
            <a href="{{ route('auth.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                Login</a>
            @if (Route::has('register'))
                <a href="{{ route('auth.register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    Register</a>
            @endif
        @endauth
    </div>
@endif
