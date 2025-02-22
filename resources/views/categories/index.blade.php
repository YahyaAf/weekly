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
                <h1 class="text-3xl font-bold text-gray-800">Liste des Catégories</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categories as $category)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $category->nom }}</h3>
                        <span class="text-gray-500 text-sm">#{{ $category->id }}</span>
                    </div>
                    
                    <div class="flex space-x-3 mt-4">
                        <a href="{{ route('categories.show', $category->id) }}" 
                           class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                            Voir
                        </a>
                        <a href="{{ route('categories.edit', $category->id) }}" 
                           class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">
                            Modifier
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"
                                    class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>