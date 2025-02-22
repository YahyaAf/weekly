<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux annonces
                </a>
            </div>

            <!-- Main content -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="relative h-96 bg-gray-100 dark:bg-gray-700">
                    @if($annonce->image)
                        <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->titre }}" 
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 right-4 flex gap-3">
                        <span class="px-4 py-2 text-sm font-medium rounded-full 
                            {{ $annonce->status == 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 
                                                          'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400' }}">
                            {{ ucfirst($annonce->status) }}
                        </span>
                        <span class="px-4 py-2 text-sm font-medium bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 rounded-full">
                            {{ $annonce->category->nom }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-start justify-between gap-6 mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $annonce->titre }}</h1>
                        <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 whitespace-nowrap">
                            {{ number_format($annonce->prix, 0, ',', ' ') }}€
                        </div>
                    </div>

                    <div class="prose prose-gray dark:prose-invert max-w-none mb-8">
                        <p class="text-gray-600 dark:text-gray-400">{{ $annonce->description }}</p>
                    </div>

                    <div class="flex items-center py-6 border-t border-gray-100 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-400 text-lg font-medium mr-4">
                                {{ substr($annonce->user->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-medium text-gray-900 dark:text-gray-100">{{ $annonce->user->name }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    Publié {{ $annonce->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-100 dark:border-gray-700 pt-8">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Commentaires</h2>
                        
                        <form action="{{ route('commentaires.store', $annonce->id) }}" method="POST" class="mb-8">
                            @csrf
                            <div class="flex items-start gap-3">
                                <div class="flex-1">
                                    <textarea name="contenu" rows="2" 
                                        class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent"
                                        placeholder="Ajouter un commentaire..."></textarea>
                                </div>
                                <button type="submit" 
                                    class="px-4 py-2 text-sm font-medium bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                    Publier
                                </button>
                            </div>
                        </form>
                    <div class="space-y-6">
                        @foreach($commentaires as $comment)
                            <div class="flex gap-4 p-4 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                                <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center text-gray-500 dark:text-gray-400 text-sm font-medium flex-shrink-0">
                                    {{ substr($comment->user->name, 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="font-medium text-gray-900 dark:text-gray-100">{{ $comment->user->name }}</div>
                                        <div class="flex items-center gap-3">
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</div>
                                            @if($comment->user_id == Auth::id())
                                                <form action="{{ route('commentaires.destroy', $comment->id) }}" method="POST" class="inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center p-1 text-gray-400 hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400 transition-colors rounded-full hover:bg-gray-100 dark:hover:bg-gray-600/50">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $comment->contenu }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>                                              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>