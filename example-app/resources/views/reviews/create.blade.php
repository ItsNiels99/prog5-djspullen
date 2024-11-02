<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create-review') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('reviews.create') }}" method="POST">
                        @csrf
                        <!--Review name -->
                        <div>
                            <x-input-label for="title" :value="__('Review Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <!-- Review Description -->
                        <div>
                            <x-input-label for="content" :value="__('Review Content')" />
                            <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required autofocus/>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="product_id" :value="__('Select Product')" />
                            <select class="block font-medium text-sm text-gray-700 dark:text-gray-300" id="product_id" name="product_id" class="block mt-1 w-full" required>
                                @foreach($products as $product)
                                    <option class="text-black bg-black" value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <x-primary-button class="ms-3 align-bottom">
                            {{ __('Make Review') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
