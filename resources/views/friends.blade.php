<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">User List</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($users as $user)
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                    <div>
                        <p class="text-xl font-semibold mb-2">{{ $user->name }}</p>
                        @if ($user->email)
                            <p class="text-gray-600 mb-4">{{ $user->email }}</p>
                        @endif
                    </div>
                    
                    @if (!auth()->user()->friends->contains($user->id))
                        <form action="{{ route('add.friend', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                                Ajouter en ami
                            </button>
                        </form>
                    @else
                        <p class="text-green-500 font-semibold text-center">Déjà ami</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>