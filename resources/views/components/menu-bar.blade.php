<div class="border-amber-950 bg-gray-800 z-20 shadow-2xl shadow-black">
    <div class="w-7/12 flex flex-col justify-center  mt-4">
        <h1 class="text-white text-6xl font-gloria py-2 px-3">
            <a href="/">
                El Profesor Community
            </a>

        </h1>
        <small class="text-red-700 ml-96 self-end pr-2 text-5xl font-damion">Blog</small>
    </div>

    <nav class="w-11/12 mx-auto mt-4 box-content p-2 z-30 h-10 rounded-lg bg-gray-800 text-white hover:shadow-blue-600/90
flex justify-center content-center shadow-2xl">
        <ul class="flex justify-evenly flex-grow mr-5 ml-5 h-full  font-serif">
            <li class="flex items-center justify-center px-4">
                <a class="text-white hover:text-blue-600 self-center" href="{{Route('media.index')}}">Fim Ak Seri</a>
            </li>
            <li class="flex items-center justify-center px-4">
                <a class="text-white hover:text-blue-600 self-center" href="{{Route('media.index')}}">Diskisyon</a>
            </li>
            <li class="flex items-center justify-center px-1">
                <a class="text-white hover:text-blue-600 self-center" href="{{Route('article.index')}}">Ekri atik</a>
            </li>
            <li class="flex items-center justify-center px-1">
                <a class="text-white hover:text-blue-600 self-center" href="{{Route('events.index')}}">Gade evenman</a>
            </li>
            <li class="flex items-center justify-center px-1">
                <a class="text-white hover:text-blue-600 self-center" href="/contact">Nou</a>
            </li>
        </ul>
        <div class="w-5/12" x-data="{ isSearching: false }">
            <form class="w-full h-full" method="post" action="{{ route('logout') }}">
                @csrf
                <div class="w-full h-full flex justify-center items-center">
                    <input class="w-10/12 h-full text-black border-none rounded-lg pl-2 shadow-2xl" type="text"
                           placeholder="chache atik">
                    <button type="submit" class="h-full px-3 ml-2 hover:bg-slate-600 rounded-full hover:z-40 hover:shadow-black" @mouseenter="isSearching = true"
                            @mouseleave="isSearching = false"
                            :class="{ 'transform scale-110 rotate-6': isSearching, 'transform-none': !isSearching }"
                            :style="{ transition: 'transform 0.3s ease-in-out' }">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="w-40 ml-5 mr-5 text-center flex items-center justify-center h-full">
            <a href="{{ route('logout') }}" class="relative">
                <i class="fa-solid fa-arrow-right-from-bracket hover:shake mx-auto p-1 fa-lg self-center">
                    <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-black text-white px-2 py-1 rounded opacity-0 transition duration-300 ease-in-out">Soti</span>
                </i>
            </a>
            @auth
                <div class="relative ml-2" x-data="{ open: false }">
                    <div @mouseover="open = true" @mouseleave="setTimeout(() => { open = false }, 1000000)">
                        <span class="font-serif text-lg hover:text-red-500 cursor-pointer">
                           {{ ucfirst(mb_substr(auth()->user()->name, 0, 10)) . '...' }}
                        </span>
                    </div>
                    <div class="absolute top-8 right-0 bg-white border rounded shadow-md p-1 mt-1" x-show="open" @mouseover="open = true" @mouseleave="open = false">
                        <a href="{{Route('setting')}}" @mouseover="open = true" @mouseleave="open = false" class="text-center text-black text-lg h-full w-full p-2 font-serif hover:bg-gray-800 hover:text-white">Paramètres</a>
                        <!-- Autres éléments de menu -->
                    </div>
                </div>
            @endauth
        </div>



    </nav>
</div>
