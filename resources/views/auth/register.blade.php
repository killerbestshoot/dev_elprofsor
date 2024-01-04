<x-layout>
    <x-slot name="title">
        El Profsor Community | Kreye Kont
    </x-slot>
    <div class="w-full p-5 flex flex-col items-center justify-center bg-bodypic2 bg-cover bg-center  min-h-full">
        <div
            class="w-2/4 shadow-2xl flex flex-col justify-center items-center mb-4 mt-6  bg-white bg-opacity-40 rounded-2xl h-1/5">
            <div class="w-3/4 mx-auto p-3 my-3">
                <h3 class="w-full text-4xl text-black font-bold font-serif text-center">Kreye Kont</h3>
            </div>
        </div>
        @if($errors->has('email'))
            <ul>
                @foreach($errors->get('email') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div
            class="w-2/4 mx-auto shadow-2xl p-5 flex flex-col justify-center items-center rounded-2xl bg-white bg-opacity-40 h-4/5">
            <form class="w-3/5 mx-auto flex flex-col justify-center p-2 text-white mt-5" action="/register"
                  method="POST">
                @csrf

                <!-- Champ Texte -->
                @include('components.label',['text'=>'Non itilizate'])
                <input
                    class="h-10 w-full bg-gray-200 rounded-lg block px-4"
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="egz: tokyo509"
                >

                <!-- Champ Email -->
                @include('components.label',['text'=>'Imel'])
                <input
                    class="h-10 w-full bg-gray-200 rounded-lg block px-4"
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    placeholder="egz: tokyo509@gmail.com"
                >

                <!-- Champ Mot de passe -->
                @include('components.label',['text'=>'Paswod'])
                <input
                    class="h-10 w-full bg-gray-400 rounded-lg block px-4"
                    type="password"
                    name="password"
                    id="password"
                    value="{{ old('password') }}"
                >

                <!-- Bouton -->
                @include('components.button', ['text' => 'konekte'])
            </form>
            <small class="w-2/6 mx-auto p-2 mt-4 text-center text-lg text-black">
                oubyen konekte avek
            </small>
            <div class="w-3/5 p-2 flex justify-around  mx-auto mt-5 mb-5">
                <a  href="/auth/redirect/github" class="w-1/5 h-16 flex justify-center items-center hover:shake"><i
                        class="fa-brands fa-github fa-3x self-center fa-solid"></i></a>
                <a class="w-1/5 h-16 flex justify-center items-center hover:shake"><i
                        class="fa-brands fa-facebook fa-3x self-center"></i></a>
                <a href="/auth/redirect/google" class="w-1/5 h-16 flex justify-center items-center hover:shake"><i
                        class="fa-brands fa-google fa-3x self-center"></i></a>
                <a class="w-1/5 h-16 flex justify-center items-center hover:shake"><i
                        class="fa-brands fa-discord fa-3x self-center"></i></a>
            </div>
        </div>
    </div>
</x-layout>
