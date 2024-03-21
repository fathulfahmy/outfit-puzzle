<x-guest-layout>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="{{ url('/posts') }}"
                    class="font-semibold text-gray-900 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Puzzles</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-900 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-900 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="text-center text-gray-900">
        <h1 class="font-extrabold text-5xl">Outfit Puzzles</h1>
        <p class="mt-2">Find the missing piece to your fashion journey</p>
    </div>
</x-guest-layout>
