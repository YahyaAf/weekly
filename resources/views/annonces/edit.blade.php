<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Annonce</title>
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
                    <h1 class="text-3xl font-bold">Modifier l'annonce</h1>
                    <p class="mt-2 text-blue-100">Modifiez le formulaire ci-dessous pour mettre à jour votre annonce</p>
                </div>

                <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')
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
                                <input type="text" name="titre" id="titre" value="{{ old('titre', $annonce->titre) }}" class="w-full px-4 py-3 rounded-lg border @error('titre') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ex: iPhone 13 Pro Max - État neuf" required>
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
                                    <input type="number" min="0" step="0.01" name="prix" id="prix" value="{{ old('prix', $annonce->prix) }}" class="w-full pl-8 px-4 py-3 rounded-lg border @error('prix') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="0.00" required>
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
                                            <option value="{{ $category->id }}" {{ old('categorie_id', $annonce->categorie_id) == $category->id ? 'selected' : '' }}>{{ $category->nom }}</option>
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
                                @if($annonce->image)
                                    <div class="mt-4">
                                        <img src="{{ asset('storage/' . $annonce->image) }}" alt="Image actuelle" class="w-32 h-32 object-cover rounded-lg">
                                    </div>
                                @endif
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description détaillée <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="6" class="w-full px-4 py-3 rounded-lg border @error('description') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Décrivez votre produit en détail (caractéristiques, état, défauts éventuels...)" required>{{ old('description', $annonce->description) }}</textarea>
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
                                <option value="actif" {{ old('status', $annonce->status) == 'actif' ? 'selected' : '' }}>Actif</option>
                                <option value="brouillon" {{ old('status', $annonce->status) == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                <option value="archivé" {{ old('status', $annonce->status) == 'archivé' ? 'selected' : '' }}>Archivé</option>
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
                            Mettre à jour l'annonce
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>