<x-layout>
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    <div class="flex flex-col bg-gray-300 w-full min-h-screen">
        @include('components.menu-bar')
        {{--        --}}
        <div class="w-11/12 mx-auto my-10 flex flex-col justify-center">
            <div class="w-10/12 mx-auto flex justify-center  items-baseline">
                <div class="w-52 h-72 bg-slate-800">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="article image" class="w-full h-full">

                </div>
                <div class="w-3/5 mx-auto">
                    <h1 class="w-full text-center text-2xl font-semibold text-gray-700 dark:text-gray-700">
                        {{ $article->title }}
                    </h1>
                </div>

            </div>
            <p class="w-10/12 mx-auto text-justify py-3 mt-5">
                {!! nl2br(e($article->description)) !!}


            </p>
        </div>
        <div class="w-9/12 my-6 mx-auto flex justify-center align-baseline items-center">
            <div class="w-4/12 flex flex-col justify-center p-2 rounded-lg text-left border border-black">
                <h3 class="w-full text-center font-serif text-lg">
                    Info
                </h3>
                <ul class="ml-2 p-1">
                    <li>Ote : {{ $article->author }}</li>
                    <li>Dat piblication : {{ $article->created_at }}</li>
                    <li>tag : {{$article->tags}}</li>
                    <li>kategori : {{$article->category}}</li>
                    <li>lyen : {{$article->url}}</li>
                </ul>
            </div>
            <div class="w-4/12 ">

            </div>
            <div class="w-4/12">

            </div>
        </div>
    </div>
</x-layout>
