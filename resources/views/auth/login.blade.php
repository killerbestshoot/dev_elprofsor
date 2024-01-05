<x-layout>
    <x-slot name="title">
        El Profsor Community | koneksyon
    </x-slot>
    <main class="min-h-screen min-w-full flex flex-col items-center justify-center bg-bglogin bg-center bg-cover">
        <div class="w-3/6  mx-auto h-4/5 p-5 self-center">
            <h1 class="text-4xl font-bold font-serif text-center text-white mb-5">
                Koneksyon
            </h1>

            <form class="justify-center w-4/6 mx-auto rounded-2xl bg-white bg-opacity-20 shadow-red-700/95" method="POST" action="login">
                @csrf
               <div class="flex flex-col justify-center w-full p-5 pb-1">
                   @include('components.label',['text'=>'Imel'])
                   <input class="h-10 w-full bg-gray-200 rounded-lg block px-4 mb-5" type="email" name="email" placeholder="egz 509_ayiti@gmail.com" value="{{old('email')}}">
                   @include('components.label',['text'=>'Paswod'])
                   <input class="h-10 w-full bg-gray-200 rounded-lg block px-4" type="password" name="password" placeholder="egz ***********" value="{{old('password')}}">
                   <div class="pl-2 mb-10">
                       <label>
                           <input class="rounded-2xl bg-gray-300 " type="checkbox" name="remember" id="remember">
                           <span class="hover:text-blue-600 hover:underline">Songe m </span>
                       </label>
                       @if (Route::has('password.request'))
                           <a href="{{ route('password.request') }}" class="float-right text-sm underline hover:text-red-900 mr-3 text-black">
                               {{ __('Mwen bliye modpas mwen ') }}
                           </a>
                       @endif
{{--                       @error('email')--}}
{{--                       <p class="text-red-500 text-xs mt-2">--}}
                   </div>
                   @include('components.button',['text'=>'Konekte'])
{{--                   // add a don't have account link--}}
                   <a href="{{route('register')}}" class="text-blue-600 mt-6 hover:text-blue-900 mx-auto p-0">
                       <span class="text-sm">
                           <i class="fas fa-user-plus"></i>
                           <span class="ml-1 underline text-black">
                               mwen poko gen kont
                           </span>
                       </span>
                   </a>

               </div>
            </form>
        </div>
    </main>
</x-layout>
