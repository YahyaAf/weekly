<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Annonce</title>
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
            <div class="mb-6">
                <a href="{{ route('annonces.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux annonces
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
                    <h1 class="text-3xl font-bold">Créer une nouvelle annonce</h1>
                    <p class="mt-2 text-blue-100">Remplissez le formulaire ci-dessous pour publier votre annonce</p>
                </div>

                <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @if ($errors->any())
                    <div class="mb-6 bg-red-50 text-red-700 p-4 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-6">
                                <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">Titre de l'annonce <span class="text-red-500">*</span></label>
                                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" class="w-full px-4 py-3 rounded-lg border @error('titre') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ex: iPhone 13 Pro Max - État neuf" required>
                                @error('titre')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">€</span>
                                    </div>
                                    <input type="number" min="0" step="0.01" name="prix" id="prix" value="{{ old('prix') }}" class="w-full pl-8 px-4 py-3 rounded-lg border @error('prix') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="0.00" required>
                                </div>
                                @error('prix')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="categorie_id" class="block text-sm font-medium text-gray-700 mb-2">Catégorie <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="categorie_id" id="categorie_id" class="w-full px-4 py-3 rounded-lg border @error('categorie_id') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none" required>
                                        <option value="">Sélectionnez une catégorie</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('categorie_id') == $category->id ? 'selected' : '' }}>{{ $category->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('categorie_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <div class="mb-6">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Photo du produit <span class="text-red-500">*</span></label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                <span>Télécharger une image</span>
                                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description détaillée <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="6" class="w-full px-4 py-3 rounded-lg border @error('description') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Décrivez votre produit en détail (caractéristiques, état, défauts éventuels...)" required>{{ old('description') }}</textarea>
                                <div class="mt-1 text-right text-xs text-gray-500">
                                    Maximum 1000 caractères
                                </div>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Statut de l'annonce</label>
                        <div class="relative">
                            <select name="status" id="status" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none">
                                <option value="">Choisir un status</option>
                                <option value="actif">Actif</option>
                                <option value="brouillon">Brouillon</option>
                                <option value="archivé">Archivé</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                        <button type="button" onclick="window.location.href='{{ route('annonces.index') }}'" class="py-3 px-6 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Annuler
                        </button>
                        <button type="submit" class="py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Enregistrer l'annonce
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>