<x-app-layout>
    <div class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform hover:scale-105 transition duration-300">
                <div class="md:flex">
                    <div class="md:flex-shrink-0 md:w-1/2">
                        <img class="h-full w-full object-cover" src="https://t3.ftcdn.net/jpg/01/07/00/50/360_F_107005010_vHGDB9kSbCKY0bYpYkGd9oAhgmSY9f8v.jpg" alt="Store showcase">
                    </div>
                    <div class="p-8 md:w-1/2">
                        <div class="uppercase tracking-wide text-sm text-[#5C8374] font-semibold animate-pulse">
                            Nouvelle collection
                        </div>
                        <h1 class="mt-2 text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl animate-fade-in-down">
                            Découvrez SuperShop
                        </h1>
                        <p class="mt-4 text-xl text-gray-600 animate-fade-in-up">
                            Plongez dans un univers de style et d'innovation. Chez SuperShop, chaque article raconte une histoire, chaque achat est une expérience.
                        </p>
                   
                        <div class="mt-8 animate-bounce-subtle">
                            <a href="{{ route('showArticle') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-[#5C8374] hover:bg-[#4A6B5D] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5C8374] transition duration-150 ease-in-out">
                                Explorer notre collection
                                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="flex justify-between items-center flex-wrap">
                        <div class="flex items-center space-x-2">
                            <svg class="h-5 w-5 text-[#5C8374]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">Livraison gratuite à partir de 50€</span>
                        </div>
                        <div class="flex items-center space-x-2 mt-2 sm:mt-0">
                            <svg class="h-5 w-5 text-[#5C8374]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="text-sm font-medium text-[#5C8374] hover:text-[#4A6B5D] transition duration-150 ease-in-out">
                                En savoir plus sur nos services
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes bounceSoft {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out;
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }
        .animate-bounce-subtle {
            animation: bounceSoft 2s infinite;
        }
    </style>
</x-app-layout>