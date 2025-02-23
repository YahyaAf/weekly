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