<x-app-layout>
    <main class="flex-grow container mx-auto my-8 px-4">
        <div class="bg-white rounded-lg shadow-xl p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-[#000] to-[#93B1A6]">Ajouter un nouveau produit</h1>
            <div class="mb-8 text-center">
                <p class="text-gray-600">Remplissez tous les champs pour ajouter votre produit à notre marketplace
                    exclusive.</p>
            </div>
            <form class="space-y-6" action="{{ route("article.store") }}" method="Post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-lg font-semibold text-[#4a654f]">Nom du produit</label>
                        <input type="text" name="name" placeholder="Entrez le nom du produit"
                            class="mt-1 block w-full rounded-md border-2 border-[#F4DFC8] shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 placeholder:ps-3"
                            required>
                    </div>
                    <div>
                        <label for="category" class="block text-lg font-semibold text-[#4a654f]">Catégorie</label>
                        <select name="category"
                            class="mt-1 block w-full rounded-md border-2 border-[#F4DFC8] shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2"
                            required>
                            <option value="" disabled selected>Sélectionnez une catégorie</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="enfant">Enfant</option>

                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-lg font-semibold text-[#4a654f]">Prix</label>
                        <input type="number" name="price" placeholder="Entrez le prix"
                            class="mt-1 block w-full rounded-md border-2 border-[#F4DFC8] shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 placeholder:ps-3"
                            required>
                    </div>
                    <div>
                        <label for="size" class="block text-lg font-semibold text-[#4a654f]">Taille</label>
                        <select type="text" name="size"
                            class="mt-1 block w-full rounded-md border-2 border-[#F4DFC8] shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2"
                            required>
                            <option value="" disabled selected>Selectionnez une taille</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>

                        </select>
                    </div>
                </div>
                <div>
                    <label for="description" class="block text-lg font-semibold text-[#4a654f]">Description</label>
                    <textarea name="description" rows="4" placeholder="Entrez la description du produit"
                        class="mt-1 block w-full rounded-md border-2 border-[#F4DFC8] shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:ps-3 placeholder:pt-2"
                        required></textarea>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="stock" class="block text-lg font-semibold text-[#4a654f]">Stock</label>
                        <input type="number" name="stock" placeholder="Entrez la quantité en stock"
                            class="mt-1 block w-full rounded-md py-2 border-2 border-[#F4DFC8] shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:ps-3"
                            required>
                    </div>
                    <div>
                        <label for="type" class="block text-lg font-semibold text-[#4a654f]">Type</label>
                        <select name="type"
                            class="mt-1 block w-full rounded-md border-2 border-[#F4DFC8] shadow-sm focus:border-[#183D3D]focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 placeholder:ps-3"
                            required>
                            <option value="" disabled selected>Sélectionnez le Type</option>
                            <option value="nouveau">Nouveau</option>
                            <option value="solde">Solde</option>
                            <option value="hot">Hot</option>

                        </select>
                    </div>
                    <div>

                    </div>
                </div>

                <div>
                    <label for="image" class="block text-lg font-semibold text-[#4a654f]">Image du produit</label>
                    <input type="file" name="image" accept="image/png,jpg"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FAF6F0] file:text-[#93B1A6] hover:file:bg-[#FDE5D4]"
                        required>
                </div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#93B1A6] to-[#183D3D] hover:from-[#183D3D] hover:to-[#93B1A6] text-white font-bold py-3 px-4 rounded-full transition duration-300 transform hover:scale-105">
                    Ajouter le produit
                </button>
            </form>
        </div>
    </main>

</x-app-layout> 