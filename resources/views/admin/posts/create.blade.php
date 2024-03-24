<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new post') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            <input name="title" placeholder="Title"
                class="block w-full mt-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('title') }}</input>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <textarea name="body" placeholder="Description"
                class="block w-full mt-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('body') }}</textarea>
            <x-input-error :messages="$errors->get('body')" class="mt-2" />

            <input type="file" name="image" class="block w-full mt-4">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />

            <div class="w-full flex justify-end">
                <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
