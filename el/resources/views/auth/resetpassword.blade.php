<x-layout>
    <x-slot name="title">
        El Profesor Community | change modpas
    </x-slot>
    <main class="min-h-screen min-w-full flex flex-col items-center justify-center bg-bglogin bg-center bg-cover">
        <div class="w-full md:w-3/6  mx-auto h-4/5 p-5 self-center">
            <h1 class="text-4xl font-bold font-serif text-center text-white mb-5">
                Change modpas
            </h1>

            <form class="justify-center w-5/6  lg:w-9/12 mx-auto rounded-2xl bg-white bg-opacity-20 shadow-red-700/95"
                  method="POST" action="{{route('password.email')}}">
                @csrf
{{--                @method('PUT')--}}
                <div class="flex flex-col justify-center w-full p-5 mb-10">
                    @include('components.label',['text'=>'Imel'])
                    <input class="h-10 w-full bg-gray-200 rounded-lg block px-4 mb-5" type="email" name="email"
                           placeholder="egz 509_ayiti@gmail.com" value="{{old('email')}}">
                    @include('components.button',['text'=>'Voye lyen'])
                </div>
            </form>
        </div>
    </main>
</x-layout>
