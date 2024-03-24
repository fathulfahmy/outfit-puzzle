<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View post') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-6 flex">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $post->user->name }}</span>
                            <small
                                class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
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
                    <img src="{{ $post->getFirstMediaUrl() }}" class="mt-4">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>