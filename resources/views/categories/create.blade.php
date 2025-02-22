<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
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
            <div class="max-w-2xl mx-auto">
                <div class="mb-6 flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-gray-800">Ajouter une nouvelle catégorie</h1>
                    <a href="{{ route('categories.index') }}" 
                       class="flex items-center text-blue-500 hover:text-blue-600 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour à la liste
                    </a>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom de la catégorie
                            </label>
                            <input type="text" 
                                   name="nom" 
                                   id="nom" 
                                   value="{{ old('nom') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                                   placeholder="Entrez le nom de la catégorie">
                            @error('nom')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Ajouter la catégorie
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>