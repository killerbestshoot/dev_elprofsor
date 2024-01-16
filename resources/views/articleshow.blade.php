<x-layout>
    <x-slot name="title">
        {{ $article->title }}
    </x-slot>
    <div class="flex flex-col bg-gray-300 w-full min-h-screen">
        @include('components.menu-bar')
        {{--        --}}
        <div class="w-11/12 mx-auto my-10 flex flex-col justify-center">
            <div class="w-10/12 mx-auto flex justify-center  items-baseline">
                <div class="w-52 h-72 bg-slate-800 z-50 shadow-2xl shadow-black">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="article image" class="w-full h-full">

                </div>
                <div class="w-3/5 mx-auto">
                    <h1 class="w-full text-center text-2xl font-semibold text-gray-700 dark:text-gray-700">
                        {{ $article->title }}
                    </h1>
                </div>

            </div>
            <p class="w-10/12 mx-auto text-justify py-3 mt-5 font-serif text-lg">
                {!! nl2br(e($article->description)) !!}
            </p>
        </div>
        <div class="w-9/12 my-6 mx-auto p-1 flex justify-between mb-20 align-baseline items-center">
            <div class="w-4/12 flex flex-col justify-center p-2 rounded-lg text-left border border-black">
                <h3 class="w-full text-center font-serif text-lg">
                    Info
                </h3>
                <ul class="mx-1 p-1 w-full overflow-hidden text-wrap">
                    <li>Ote : {{ $article->author }}</li>
                    <li>Dat piblikasyon : {{ $article->created_at }}</li>
                    <li>tag : {{$article->tags}}</li>
                    <li>kategori : {{$article->category}}</li>
                    <li>lyen : <a href="{{ Route('article.show', ['title' => $article->title]) }}" class="text-blue-600 hover:text-blue-900 underline whitespace-normal">{{$article->url}}</a></li>
                </ul>
            </div>
            <div class="w-7/12 ">
                <form >
                    @csrf
                    <label for="description" class="block text-gray-700 font-bold">komante:</label>
                    <textarea
                        name="comment"
                        id="comment"
                        class="rounded-lg text-white bg-slate-800 border-2 border-gray-300 p-2 w-full h-32"
                        placeholder="fe komant ou a la ....."
                    ></textarea>
                    <button type="submit" class="bg-slate-800 hover:shake hover:shadow-blue-800/70 text-white font-bold py-2 px-4 rounded-full">komante</button>

                </form>

            </div>
        </div>
        <div class="w-10/12 mx-auto mb-20 p-2 flex flex-col">
            <h1 class="w-full text-center text-2xl font-semibold text-gray-700 dark:text-gray-700 mb-10">
                Komante Lekte Yo
            </h1>
{{--            <div class="w-9/12 mx-auto">--}}
{{--                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.--}}

{{--            </div>--}}
{{--            @foreach ($comments as $comment)--}}

                    @include('components.comments', ['text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'])

{{--            @endforeach--}}
        </div>
    </div>
</x-layout>
