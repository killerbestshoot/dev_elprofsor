<x-layout>
    <x-slot name="title">
        Ekri Yon Nouvo Atik
    </x-slot>

    <div class="flex flex-col bg-gray-300 w-full min-h-screen">
        @include('components.menu-bar')

        <div class="w-11/12 mx-auto h-auto bg-white pb-10 p-6 my-10 rounded-lg shadow-md  flex flex-col justify-center items-start">
            <div class="w-6/12 mx-auto p-3 mb-4 ">
                <h1 class="font-serif text-2xl font-bold text-center">
                    Ekri Yon Nouvo Atik
                </h1>
            </div>
            <form action="{{ route('article.store') }}" method="POST" class="w-full flex justify-around items-start p-2" enctype="multipart/form-data">
                @csrf

                <div class="mb-10 w-1/4 h-20 p-2">
                    <label for="title" class="block text-gray-700 font-bold">Tit:</label>
                    <input type="text" name="title" id="title" class="rounded-lg text-white bg-slate-800 mb-3 border-gray-300 p-2 w-full" placeholder="Ekri tit la" required>

                    <label for="category" class="block text-gray-700 font-bold">kategori:</label>
                    <input type="text" name="category" id="category" class="rounded-lg text-white bg-slate-800 mb-3 border-gray-300 p-2 w-full" placeholder="Ekri kategori" required>

                    <label for="tags" class="block text-gray-700 font-bold">tags:</label>
                    <input type="text" name="tags" id="tags" class="rounded-lg text-white bg-slate-800  border-gray-300 p-2 w-full mb-3" placeholder="Ekri tag.." required>

                    <label for="image" class="block text-gray-700 font-bold ">Imaj</label>
                    <input type="file" name="image" accept="image/*" class="bg-slate-800 font-serif text-white rounded-lg " required>
                    <input type="hidden" name="author" value="{{auth()->user()->name }}">


                </div>

                <div class="mb-20 w-3/5">
                    <label for="description" class="block text-gray-700 font-bold">Atik:</label>
                    <textarea
                        name="description"
                        id="description"
                        class="rounded-lg text-white bg-slate-800 border-2 border-gray-300 p-2 w-full h-32"
                        placeholder="komanse ekri atik ou a la ....."
                        required
                    ></textarea>

                    <button type="submit" class="bg-slate-800 hover:shake hover:shadow-blue-800/70 text-white font-bold py-2 px-4 rounded-full">Sove Atik la</button>
                </div>

                <!-- Ajoutez d'autres champs selon vos besoins -->

            </form>
        </div>
    </div>
</x-layout>

