<x-layout>
    <x-slot name="title">
        El Profsor Community | Atik
    </x-slot>
    <div class="flex flex-col bg-gray-300 w-full min-h-screen">
        @include('components.menu-bar')
{{--        --}}
        @if(count($articles) > 0)
            @include('components.articles')
        @else
            <div class="w-2/4 mx-auto rounded-lg p-10 bg-gray-500 my-auto">
                <h1 class="w-11/12 mx-auto text-center py-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Aucun article
                </h1>
            </div>
        @endif
        <div class="fixed bottom-10 right-20 rounded-full h-12 w-36 z-50 flex transition hover:shake">
            <a href="{{ route('article.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-center w-full h-full font-bold py-3 rounded-full">Nouvel Article</a>
        </div>

    </div>
</x-layout>
