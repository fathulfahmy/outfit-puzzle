<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">

        <a href="{{ route('admin.posts.create') }}">
            <x-primary-button>{{ __('Create New Post') }}</x-primary-button>
        </a>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full table-fixed text-left rtl:text-right">
                    <thead class="uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-2/12">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3 w-3/12">
                                Text
                            </th>
                            <th scope="col" class="px-6 py-3 w-2/12">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 w-2/12">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3 w-2/12">
                                Timestamp
                            </th>
                            <th scope="col" class="px-6 py-3 w-1/12">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="odd:bg-white even:bg-gray-50 text-start">
                                <td class="px-6 py-4">
                                    <span class="font-bold">{{ $post->user->name }}</span>
                                    <br>
                                    {{ $post->user->email }}
                                    </th>
                                <td class="px-6 py-4">
                                    <span class="font-bold">{{ $post->title }}</span>
                                    <br>
                                    <p class="whitespace-pre-wrap">{{ $post->body }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <img class="max-w-60" src="{{ $post->getFirstMediaUrl() }}" />
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-semibold">Slug:</span> {{ $post->slug }}
                                </td>
                                <td class="px-6 py-4">
                                    <p>
                                        {{ $post->created_at->diffForHumans() }}
                                        <br>
                                        <span class="font-semibold">Created at: </span>
                                        {{ $post->user->created_at->format('j M Y, g:i a') }}
                                        <br>
                                        @unless ($post->created_at->eq($post->updated_at))
                                            <span class="font-semibold">Updated at:</span>
                                            {{ $post->user->updated_at->format('j M Y, g:i a') }}
                                        @endunless
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <a href="{{ route('admin.posts.show', $post) }}">
                                            <x-primary-button class="w-full">{{ __('View') }}</x-primary-button>
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('admin.posts.edit', $post) }}">
                                            <x-primary-button
                                                class="w-full bg-blue-900">{{ __('Edit') }}</x-primary-button>
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('admin.posts.destroy', $post) }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                <x-danger-button class="w-full">{{ __('Delete') }}</x-danger-button>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
