<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($annonces as $annonce)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="relative h-56 bg-gray-100 dark:bg-gray-700 overflow-hidden">
                        @if($annonce->image)
                            <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->titre }}" 
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100 dark:bg-gray-700">
                                <svg class="w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 text-sm font-medium rounded-full 
                                        {{ $annonce->status == 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 
                                                                          'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400' }}">
                                {{ ucfirst($annonce->status) }}
                            </span>
                        </div>
                        
                        <div class="absolute bottom-3 left-3">
                            <span class="px-3 py-1 text-xs font-medium bg-white/80 dark:bg-black/50 backdrop-blur-sm text-gray-700 dark:text-gray-300 rounded-full shadow-sm">
                                {{ $annonce->category->nom }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-2 mb-3">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 line-clamp-1">{{ $annonce->titre }}</h3>
                            <div class="text-xl font-bold text-blue-600 dark:text-blue-400 whitespace-nowrap">{{ number_format($annonce->prix, 0, ',', ' ') }}€</div>
                        </div>
                        
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">{{ $annonce->description }}</p>
                        
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-400 mr-2">
                                {{ substr($annonce->user->name, 0, 1) }}
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $annonce->user->name }}</span>
                                <div class="text-xs text-gray-500 dark:text-gray-500">{{ $annonce->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                            <div class="flex justify-center">
                                <a href="{{ route('frontOffice.show', $annonce->id) }}" 
                                    class="inline-flex items-center px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors text-sm">
                                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                      </svg>
                                      Voir les détails
                                </a>                                  
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-8 text-center">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-2">Aucune annonce disponible</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Revenez bientôt pour découvrir de nouvelles annonces!</p>
                    </div>
                </div>
                @endforelse
            </div>
    
            
            <!-- Pagination -->
            @if($annonces->count() > 0)
            <div class="mt-12 flex justify-center">
                {{ $annonces->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>