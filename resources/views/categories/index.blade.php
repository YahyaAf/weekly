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
        <aside class="fixed left-0 top-0 h-screen w-65 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 shadow-2xl">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-8 px-2">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Dashboard</h2>
                </div>
        
                <div class="space-y-8">
                    <nav>
                        <h3 class="flex items-center text-sm font-semibold text-gray-400 mb-4 uppercase tracking-wider px-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                            </svg>
                            Annonces
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('annonces.create') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <span>Nouvelle Annonce</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('annonces.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                    <span>Liste des Annonces</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('annonces.archive') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                    </svg>
                                    <span>Archives</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
        
                    <nav>
                        <h3 class="flex items-center text-sm font-semibold text-gray-400 mb-4 uppercase tracking-wider px-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Catégories
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('categories.create') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <span>Nouvelle Catégorie</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                    <span>Liste des Catégories</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
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