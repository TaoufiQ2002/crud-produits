<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Ajouter un bouton pour créer un produit -->
                    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg mb-4 inline-block">
                        Créer un nouveau produit
                    </a>
                    <!-- Table des produits -->
                    <h3 class="text-xl font-semibold">Liste des produits</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">Nom</th>
                                <th class="border border-gray-300 px-4 py-2">Description</th>
                                <th class="border border-gray-300 px-4 py-2">Prix</th>
                                <th class="border border-gray-300 px-4 py-2">Stock</th>
                                <th class="border border-gray-300 px-4 py-2">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->prix }} DH</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->stock }}</td>
                                    <td class="border border-gray-300 px-4 py-2">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
