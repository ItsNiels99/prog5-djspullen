<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Tags to Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.addTags', $product->id) }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="tags" :value="__('Tags')" />
                            <select name="tags[]" id="tags" class="form-select rounded-md shadow-sm mt-1 block w-full" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Add Tags') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
