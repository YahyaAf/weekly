<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <aside class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-gray-900 to-gray-800 shadow-2xl">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-white mb-8 flex items-center">
                    <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    Dashboard
                </h2>
        
                <nav class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-400 mb-4 uppercase tracking-wider">Annonces</h3>
                    <ul>
                        <li class="mb-3">
                            <a href="{{ route('annonces.create') }}" class="flex items-center p-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-300 transform hover:translate-x-2">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Nouvelle Annonce
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('annonces.index') }}" class="flex items-center p-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-300 transform hover:translate-x-2">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Liste des Annonces
                            </a>
                        </li>
                    </ul>
                </nav>
        
                <nav>
                    <h3 class="text-lg font-semibold text-gray-400 mb-4 uppercase tracking-wider">Catégories</h3>
                    <ul>
                        <li class="mb-3">
                            <a href="{{ route('categories.create') }}" class="flex items-center p-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-300 transform hover:translate-x-2">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Nouvelle Catégorie
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}" class="flex items-center p-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-300 transform hover:translate-x-2">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Liste des Catégories
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        
        <main class="ml-64 flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Liste des Annonces</h1>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($annonces as $annonce)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        @if($annonce->image)
                            <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->titre }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-300">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $annonce->titre }}</h3>
                            <span class="px-2 py-1 text-sm {{ $annonce->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded-full">
                                {{ $annonce->status }}
                            </span>
                        </div>
                        
                        <div class="text-2xl font-bold text-blue-600 mb-3">{{ number_format($annonce->prix, 0, ',', ' ') }} €</div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $annonce->description }}</p>
                        
                        <div class="flex items-center mb-4">
                            <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm mr-2">
                                {{ $annonce->category->nom }}
                            </span>
                            <span class="text-sm text-gray-500">
                                Par {{ $annonce->user->name }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between mt-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('annonces.show', $annonce->id) }}" class="px-3 py-2 bg-blue-50 text-blue-700 rounded hover:bg-blue-100 transition-colors text-sm">
                                Voir détails
                            </a>
                            <div class="flex space-x-2">
                                <a href="{{ route('annonces.edit', $annonce->id) }}" class="px-3 py-2 bg-amber-50 text-amber-700 rounded hover:bg-amber-100 transition-colors text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                    Modifier
                                </a>
                                <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 bg-red-50 text-red-700 rounded hover:bg-red-100 transition-colors text-sm flex items-center" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce?')">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>