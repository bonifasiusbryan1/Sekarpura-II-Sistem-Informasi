<hr>

<div class="card bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="mx-auto my-10 flex max-w-xs flex-col items-center rounded-xl px-4 py-4 text-center md:max-w-lg md:flex-row md:items-start md:text-left">
        <div class="mb-4 md:mr-6 md:mb-0">
            <img style="width: 100px; height: 100px; object-fit: cover;" class="me-3 avatar-sm rounded-full"
            src="{{ $user->getImageURL() }}" alt="{{ $user->name }}">
        </div>
        <div class="">
            <p class="text-xl font-bold text-gray-800">{{ $user->name }}</p>
            <span class="text-sm text-gray-600">{{ $user->nip }}</span>
            <div class="flex space-x-2 mt-2">
                <div class="flex flex-col items-center rounded-xl bg-gray-100 px-4 py-2">
                    <p class="text-sm font-medium text-gray-500">Threads</p>
                    <span>{{ $user->threads()->count() }}</span>
                </div>
                <div class="flex flex-col items-center rounded-xl bg-gray-100 px-4 py-2">
                    <p class="text-sm font-medium text-gray-500">Likes</p>
                    <span>{{ $user->likes()->count() }}</span>
                </div>
                <div class="flex flex-col items-center rounded-xl bg-gray-100 px-4 py-2">
                    <p class="text-sm font-medium text-gray-500">Comments</p>
                    <span>{{ $user->comments()->count() }}</span>
                </div>
            </div>
            <div class="mt-4">
                <h5 class="text-lg font-bold mt-4"> Bio : </h5>
                <p class="text-base text-gray-700">{{ $user->bio }}</p>
            </div>
            <div class="mt-4">
                @auth
                    @if (Auth::id() === $user->id)
                    <a href="{{ route('users.edit', $user->id) }}" class="w-full rounded-lg border-2 bg-white px-4 py-2 font-medium text-gray-500 text-center inline-block">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>

<hr>
