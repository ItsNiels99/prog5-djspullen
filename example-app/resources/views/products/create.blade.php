<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ url('/create-product') }}" method="POST">
                        @csrf
                        <!--Product name -->
                        <div>
                            <x-input-label for="title" :value="__('Product Titel')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <!-- Product Description -->
                        <div>
                            <x-input-label for="description" :value="__('Product Omschrijving')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus/>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('Product Prijs')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" placeholder="1.0" step="0.01" min="0" :value="old('price')" required autofocus/>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="tags" :value="__('Product Onderwerpen')" />
                            <select name="tags[]" id="tags" class="block bg-gray-800 mt-1 w-full" multiple>
                                @foreach(App\Models\Tag::all() as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>
                        <x-primary-button class="ms-3 align-bottom">
                            {{ __('Make Product') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
