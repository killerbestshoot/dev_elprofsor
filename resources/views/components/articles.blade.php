<div class="w-11/12 mx-auto my-10 h-3/4 grid gap-3 grid-cols-3">
        @foreach($articles as $article)
            <div class="bg-white shadow-md flex items-center mx-auto rounded p-2 mb-4 w-80 hover:z-40 hover:shake hover:shadow-black">
                <div class="flex items-center h-full w-full flex-col justify-between mb-4 mt-1 p-1">
                    <h1 class="w-11/12 mx-auto text-center py-3 text-2xl font-semibold text-gray-700 dark:text-gray-700">
                        {{ $article->title }}
                    </h1>
                    <p class="text-gray-700 dark:text-gray-400 text-justify py-2 px-1 w-full">
                        {{ strlen($article->description) > 500 ? substr($article->description, 0, 500) . '...' : $article->description }}
                    </p>

                    <div class="flex justify-center w-full mx-auto">
                        <div class="w-2/4 flex justify-evenly items-center">
                            <i class="fa-thin fa-thumbs-down fa-2xl"></i>
                            <i class="fa-thin fa-heart"></i>
                        </div>
                        <a href="{{ route('article.show', ['title' => $article->title]) }}" class="w-2/4 text-center text-blue-500 hover:text-blue-700 dark:hover:text-blue-300">
                            Lire plus
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
</div>
