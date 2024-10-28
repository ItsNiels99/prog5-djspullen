<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ url('update-product/'.$product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Product Title -->
                        <div>
                            <x-input-label for="title" :value="__('Product Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$product->title" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <!-- Product Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Product Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$product->description" required />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <!-- Product Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Product Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" placeholder="1.0" step="0.01" min="0" :value="$product->price" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <!-- Update Button -->
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Update Product') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
