<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('See tags') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Name</th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tags as $tag)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $tag->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ url('delete-tag/'.$tag->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Delete</x-danger-button>
                                        </form>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">No Tags found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
