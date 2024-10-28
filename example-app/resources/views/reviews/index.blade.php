<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('See Reviews') }}
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
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($reviews as $review)
                                <tr>
                                    <td> {{ $review->title }}</td>
                                    <td> {{ $review->description }}</td>
                                    <td>
                                        <a href="{{url('/edit-review/'.$review->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('delete-review/'.$review->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Delete</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Reviews found</td>
                                </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
