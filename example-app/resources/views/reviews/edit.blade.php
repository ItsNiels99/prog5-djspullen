<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('edit-review') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ url('update-review/'.$review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--Review name -->
                        <div>
                            <x-input-label for="title" :value="__('Review Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$review->title" autofocus/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <!-- Product Content -->
                        <div>
                            <x-input-label for="content" :value="__('Review Content')" />
                            <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" :value="$review->content" autofocus/>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <x-primary-button class="ms-3 align-bottom">
                            {{  __('Update Review') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
