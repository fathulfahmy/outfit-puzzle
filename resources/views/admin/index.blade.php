<x-app-layout>
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

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($posts as $post)
                <div class="p-6 flex">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $post->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">
                                    {{ $post->created_at->format('j M Y, g:i a') }}
                                </small>
                                <small class="ml-2 text-sm text-gray-600">
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                                @unless ($post->created_at->eq($post->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>

                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('admin.posts.edit', $post)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('admin.posts.destroy', $post)"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        <p class="mt-4 font-bold text-lg text-gray-900">{{ $post->title }}</p>
                        <p class="mt-4 text-lg text-gray-900 whitespace-pre-wrap">{{ $post->body }}</p>
                        <a href="{{ route('admin.posts.show', $post) }}">
                            <img src="{{ $post->getFirstMediaUrl() }}" class="mt-4">
                            <div class="flex justify-end">
                                <x-primary-button class="mt-4">{{ __('Open') }}</x-primary-button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="space-x-2"></div>
            @endforeach
        </div>
    </div>
</x-app-layout>
