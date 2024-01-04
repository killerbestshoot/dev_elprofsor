<x-layout>
    <x-slot name="title">
        El Profsor Community
    </x-slot>
    <div id="acc" class="flex flex-col justify-between bg-bodypic bg-cover bg-center h-screen">
        <div class="flex justify-between p-4">
            <div class="flex flex-col justify-center  mt-4">
                <h1 class="text-white text-7xl font-gloria py-2 px-3">
                    El Profesor Community
                </h1>
                <small class="text-red-700 ml-96 self-end pr-2 text-5xl font-damion">Blog</small>
            </div>
            @if(Route::has('login'))
                <nav class=" p-2 w-1/5 h-1/3 flex justify-around items-center">
                    @if(Auth::check())
                        <a href="{{ url('/home') }}" class="text-white text-7xl font-gloria py-2 px-3">Akey</a>
                    @else
                        @if(Route::has('register'))
                            <a href="{{route('register')}}"
                               class="text-white px-2 py-1 border-2 rounded border-white hover:bg-white hover:text-black transition duration-700 ease-out">kreye
                                kont</a>
                        @endif
                        <a href="{{route('login')}}"
                           class="text-white px-2 py-1 border-2 rounded border-white hover:bg-white hover:text-black transition duration-700 ease-out">konekte</a>
                    @endauth
                </nav>
            @endif

        </div>
        <div
            class="w-2/5  mt-16 p-5 mr-10 self-end my-auto rounded-lg shadow-2xl bg-opacity-35 bg-black hover:bg-white hover:bg-opacity-75 transition duration-1000 ease-in-out">
            <p class="p-2 text-black text-2xl font-serif ">
                <strong>O</strong>u se amate fim ak seri, ou se amate teknoloji, ebyn nap diw byenvini pami nou. El
                Profsor Community kreye yon espas spesyalman pou ou
            </p>
        </div>
    </div>
</x-layout>
