<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-700 to-gray-900">
            Mon Panier
        </h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden max-w-3xl mx-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($articles as $article)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->name }}" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $article->name }} </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $article->price * $article->pivot->quantity }} dh</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <form action="{{ route('articles.update',['id' => $article->id, 'articleId' => $article->id, 'userId' => auth()->id()]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex items-center">
                                        <button type="submit" name="action" value="decrease" class="text-gray-500 hover:text-gray-700 px-2">-</button>
                                        <input type="number" name="quantity" value="{{ $article->pivot->quantity }}" min="1" class="w-16 text-center border border-gray-300 rounded">
                                        <button type="submit" name="action" value="increase" class="text-gray-500 hover:text-gray-700 px-2">+</button>
                                    </div>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-8 max-w-3xl mx-auto">
            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                <span class="text-xl font-semibold">Total:</span>
                <span class="text-2xl font-bold"> {{ $total }} dh</span>
            </div>
            <form id="payment-form" action="{{ route('stripe.payment') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="10.00">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Payer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>