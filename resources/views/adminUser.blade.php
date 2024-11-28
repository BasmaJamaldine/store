<x-app-layout>

    <div class="container mx-auto px-6 py-8 text-center">
        <h1 class="text-3xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-[#000] to-[#93B1A6]">Liste des Utilisateurs</h1>
        
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="text-[#93B1A6] text-lg">
                    <th class="py-3 px-4 border-b">ID</th>
                
                    <th class="py-3 px-4 border-b">Nom</th>
                    <th class="py-3 px-4 border-b">Genre</th>
                    <th class="py-3 px-4 border-b">Email</th>
                    <th class="py-3 px-4 border-b">Role</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="py-3 px-4 border-b">{{ $user->id }}</td>
                    <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-3 px-4 border-b ">{{ $user->gender }}</td>
                    <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-3 px-4 border-b">{{ $user->role }}</td>
                    <td class="py-3 px-4 border-b  flex flex-row justify-center">
                        <form action="{{ route('role', $user->id ) }}" method="POST">
                            @csrf
                        <button type="submit" class="me-7 text-lime-900 font-bold"> {{ $user->role === 'moderator' ? 'User' : 'Modérateur' }}</button>
                    </form>
                    <form action=" {{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class=" text-red-700 font-semi-bold">Delete</button></form>

                    </td>
                   
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>