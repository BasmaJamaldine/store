<x-app-layout>

<div class="bg-gradient-to-r from-purple-100 to-pink-100 min-h-screen">

<div class="container mx-auto px-6 py-8 bg-[#FAF6F0]">
    <h1 class="text-4xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-[#000000] to-[#F4EAE0]">Notre Collection Exclusive</h1>

    <div class="mb-8 bg-white p-6 rounded-lg shadow-lg flex gap-10">
        <div>
            <form action="{{ route("article.filter") }}" method="POST">
                @csrf
           <label for="category" class="block text-lg font-semibold text-gray-700 mb-2">Explorez par catégorie :</label>
        <div class="relative inline-block mr-4">
          
            <select id="category" name="category" class="block w-full md:w-64 px-4 py-3 bg-white border-2 border-[#F4DFC8] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#F4DFC8] focus:border-transparent appearance-none">
                <option value="all"  selected>all</option>
                <option value="home">Homme</option>
                <option value="femme">Femme</option>
                <option value="enfant">Enfant</option>
            </select>
           
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-black">
                <i class="fas fa-chevron-down"></i>
            </div> 
        </div> 
        </div>
        
        <div>
             <label for="type" class="block text-lg font-semibold text-gray-700 mb-2">Type :</label>
        <div class="relative inline-block">
            <select id="type" name="type" class="block w-full md:w-64 px-4 py-3 bg-white border-2 border-[#F4DFC8] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#F4DFC8] focus:border-transparent appearance-none">
                <option value="all" selected>all</option>
                <option value="nouveau">Nouveau</option>
                <option value="solde">Solde</option>
                <option value="hot">Hot</option>
            </select>
            
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#000]">
                <i class="fas fa-chevron-down"></i>
            </div>
        
        </div> 
        <button type="submit" class="bg-[#000000]  hover:bg-gradient-to-r from-[#000000b3] to-[#a39689]  text-white font-bold  px-5 py-3  transition duration-300 ease-in-out transform hover:scale-110 ms-10">
            Filtrer
        </button>
        </div>
       
       </form>
    </div>
    
    

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach ($articles as $article)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
            <div class="relative">
                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->name }}" class="w-full h-64 object-cover">
                <div class="absolute top-0 right-0 bg-[#d6c2ad] text-black font-bold py-1 px-3 rounded-bl-lg">{{ $article->type }}</div>
            </div>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $article->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $article->description }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-3xl font-bold text-[#b49d85]">{{ $article->price }} DH</span>
                    <form action="{{ route('shop', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="bg-black hover:from-purple-700 hover:to-pink-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-110">
                            <i class="fas fa-cart-plus mr-2"></i>Ajouter
                        </button>
                        <input type="hidden" value="1" name="quantity">
                    </form>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>
</x-app-layout>