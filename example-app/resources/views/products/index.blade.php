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
                    <table>
                        <thead>
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Title</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Description</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Price</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td> {{ $product->title }}</td>
                                    <td> {{ $product->description }}</td>
                                    <td> {{ $product->price }}</td>
                                    <td>
                                        <a href="{{url('/edit-product/'.$product->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('delete-product/'.$product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Delete</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No products found</td>
                                </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
