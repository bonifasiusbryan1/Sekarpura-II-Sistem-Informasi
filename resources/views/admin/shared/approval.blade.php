<div class="bg-white px-4 py-6 shadow-2xl border-2 sm:p-6 sm:rounded-lg">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="w-12 h-12 rounded-full" src="{{ $thread->user->getImageURL() }}" alt="{{ $thread->user->name }}">
            </div>
            <div class="flex-1 min-w-0 ml-4">
                <h5 class="text-lg font-semibold mt-0"><a href="{{ route('users.show', $thread->user->id) }}" class="text-gray-600 hover:underline text-decoration-none">{{ $thread->user->name }}</a></h5>
                <p class="text-gray-500 text-sm">
                    <i class="fas fa-clock me-1"></i>{{  $thread->created_at->diffForHumans() }}
                </p>                
            </div>
        </div>

        <div class="dropdown">
            <button type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                </svg>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if(Route::currentRouteName() != 'threads.show')
                    <li><a class="dropdown-item" href="{{ route('threads.show', $thread->id) }}"><i class="fas fa-eye me-2"></i>View</a></li>
                @endif
                @auth
                    @if(auth()->user()->is($thread->user) || auth()->user()->role == 3)
                        <li><a class="dropdown-item" href="{{ route('threads.edit', $thread->id) }}"><i class="fas fa-pencil-alt me-2"></i>Edit</a></li>
                        <li>
                            <form method="POST" action="{{ route('threads.destroy', $thread->id) }}">
                                @csrf
                                @method('delete')
                                <button class="dropdown-item text-red-500" type="submit"><i class="fas fa-times me-2"></i>Delete</button>
                            </form>
                        </li>                            
                    @endif
                @endauth
            </ul>
        </div>
    </div>

    <hr class="my-4">

    <div>
        @if ($editing ?? false)
            <form action="{{ route('threads.update', $thread->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-6">
                    <textarea class="form-textarea block w-full px-4 py-3 leading-tight text-gray-700 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-blue-500" id="title" name="title" rows="3">{{ $thread->title }}</textarea>
                    @error('title')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                    <textarea class="form-textarea mt-4 block w-full px-4 py-3 leading-tight text-gray-700 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-blue-500" id="content" name="content" rows="6">{{ $thread->content }}</textarea>
                    @error('content')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Update</button>
                </div>
            </form>
        @else
            <h5 class="text-2xl font-semibold mb-3">{{ $thread->title }}</h5>
            <p class="text-gray-700 leading-relaxed" style="max-height: 200px; overflow-y: auto;">{{ $thread->content }}</p>
        @endif
    </div>

    <hr class="my-4">

    <div class="flex justify-between items-center">
        <span class="text-sm text-gray-500">
            <p>{{ $thread->threadCategories->category }}</p>
        </span>

        @if ($thread->status === 'pending')
            <div class="flex">
                <form action="{{ route('threads.approve', $thread->id) }}" method="post" class="me-2">
                    @csrf
                    @method('put')
                    <button type="submit" class="bg-green-500 text-white px-2 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                        <i class="fas fa-check me-1"></i>Approve
                    </button>
                </form>
                <form action="{{ route('threads.reject', $thread->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                        <i class="fas fa-times me-1"></i>Reject
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
