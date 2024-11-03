<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('See Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Titel</th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Beschrijving</th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Prijs</th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Onderwerpen</th>
                            @if(auth()->user()->isAdmin())
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Status</th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Aanpassen</th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap"> € {{ $product->price }}</td>
                                <!-- Tags -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach($product->tags as $tag)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <!-- Status -->
                                @if(auth()->user()->isAdmin())
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('products.toggleStatus', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">
                                            {{ $product->status ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('/edit-product/'.$product->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ url('delete-product/'.$product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Delete</x-danger-button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">No products found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
