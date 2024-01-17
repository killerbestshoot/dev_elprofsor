<div class="w-full md:w-9/12 lg:w-11/12 md:mx-auto
            lg:mx-auto py-4 px-2 my-10 grid gap-2 lg:gap-3 lg:grid-cols-3
            min-gap-20 grid-cols-1 sm:grid-cols-2
            md:grid-cols-2">

@foreach($articles as $article)
        <div
            class="bg-white shadow-md flex lg:shrink md:items-center sm:mx-auto md:mx-auto lg:items-center lg:mx-auto lg:rounded
            p-2 mb-4 sm:w-10/12 md:w-72 lg:w-80 hover:z-40 lg:hover:shake hover:shadow-black lg:duration-700 md:duration-700
            hover:shadow-inner md:hover:scale-105 lg:hover:scale-105">
            <div class="flex items-center h-full w-full flex-col justify-between mb-4 mt-1 p-1">
                <h1 class="w-11/12 mx-auto text-center py-3 text-2xl font-semibold text-gray-700 dark:text-gray-700">
                    {{ $article->title }}
                </h1>
                <p class="text-gray-700 dark:text-gray-400 text-justify py-2 px-1 w-full">
                    {{ strlen($article->description) > 500 ? substr($article->description, 0, 500) . '...' : $article->description }}
                </p>

                <div class="flex justify-center w-full mx-auto">
                    <div class="w-2/4 flex justify-evenly items-center">
                        <i class="fa-regular fa-heart"><small class="text-sm text-pink-700 ml-1">120</small></i>
                        <i class="fa-solid fa-thumbs-down"><small class="text-sm ml-1">12</small></i>
                    </div>
                    <a href="{{ Route('article.show', ['title' => $article->title]) }}"
                       class="w-2/4 text-center text-blue-500 hover:text-blue-700 dark:hover:text-blue-300">
                        Li plis
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{--<a href="{{ route('article.show', ['title' => str_replace(' ', '-', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $article->title)))]) }}--}}
{{--" class="w-2/4 text-center text-blue-500 hover:text-blue-700 dark:hover:text-blue-300">--}}
{{--    Lire plus--}}
{{--</a>--}}
