@php
    $forum_type_id = request()->get('forum_type_id');
@endphp

<div class="card shadow-inner mt-3">
    <div class="card-header pb-0 border-0 ">
        <h5 class="font-semibold text-2xl font-poppins">Search</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('forum') }}" method="GET" class="flex items-center">
            <div class="relative flex-grow">
                <input type="search" name="search" id="default-search" class="block w-full p-2 pl-8 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-poppins" value="{{ request('search', '') }}" placeholder="Search Threads..." required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-2">Search</button>
            <div class="mb-3 d-none">
                <label for="forum_type_id" class="form-label">forum_type_id</label>
                <input type="hidden" class="form-control" id="forum_type_id" name="forum_type_id" value="{{ $forum_type_id }}">
            </div>
        </form>
    </div>
</div>
