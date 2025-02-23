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
                <h1 class="text-3xl font-bold text-gray-800">Arshives des Annonces</h1>
            </div>
            
            <h2 class="text-xl font-bold">Annonces Supprimées</h2>

            @if($deletedAnnonces->isEmpty())
                <p>Aucune annonce archivée.</p>
            @else
                <table>
                    <tr>
                        <th>Titre</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($deletedAnnonces as $annonce)
                    <tr>
                        <td>{{ $annonce->titre }}</td>
                        <td>
                            <form action="{{ route('annonces.restore', $annonce->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Restaurer</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('annonces.forceDelete', $annonce->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer Définitivement</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            @endif
        </main>
    </div>
</body>
</html>