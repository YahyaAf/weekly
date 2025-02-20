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
        <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-lg">
            <div class="p-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h2>
                <nav>
                    <ul>
                        <li class="mb-3">
                            <a href="{{ route('annonces.create') }}" class="flex items-center p-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-blue-500 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Nouvelle Annonce
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Liste des Annonces
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
            
            <div class="">
                @foreach($annonces as $annonce)
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->titre }}</h3>
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->image }}</h3>
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->description }}</h3>
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->prix }}</h3>
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->category->nom }}</h3>
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->user->name }}</h3>
                <h3 class="text-xl font-semibold text-gray-800">{{ $annonce->status }}</h3>
             
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>