<x-app-layout>
    <div class="container mx-auto px-6 py-8 text-center">
        <h1 class="text-3xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-[#000] to-[#93B1A6]">Liste des Articles</h1>
        
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="text-[#93B1A6] text-lg">
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">Image</th>
                    <th class="py-3 px-4 border-b">Nom</th>
                    <th class="py-3 px-4 border-b">Description</th>
                    <th class="py-3 px-4 border-b">Type</th>
                    <th class="py-3 px-4 border-b">Stock</th>
                    <th class="py-3 px-4 border-b">Prix</th>
                    <th class="py-3 px-4 border-b">Catégorie</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td class="py-3 px-4 border-b">{{ $article->id }}</td>
                    <td class="py-3 px-4 border-b"> <img src="{{ asset('/storage/images/' . $user->profile_image) }}" alt="{{ $user->name }}" class="w-full h-20 object-cover">
                    </td>
                    <td class="py-3 px-4 border-b">{{ $article->name }}</td>
                    <td class="py-3 px-4 border-b text-wrap">{{ $article->description }}</td>
                    <td class="py-3 px-4 border-b">{{ $article->type }}</td>
                    <td class="py-3 px-4 border-b">{{ $article->stock }}</td>
                    <td class="py-3 px-4 border-b">{{ $article->price }} DH</td>
                    <td class="py-3 px-4 border-b">{{ $article->category }}</td>
                    <td class="py-3 px-4 border-b">
                       <div class="flex flex-row gap-8">
                       
                        <a href="" class="text-blue-500 hover:underline">Modifier</a>
                        <form action="" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ">Supprimer</button>
                        </form>
                       </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>