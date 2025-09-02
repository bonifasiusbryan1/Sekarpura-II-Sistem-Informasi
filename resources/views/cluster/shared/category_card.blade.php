<div class="container mt-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($threadCategories as $category)
        <div class="p-4 bg-white shadow-md rounded-md">
            @if ($editing ?? false)
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-textarea w-full border border-gray-300 rounded-md" style="height: auto; min-height: 38px;" id="category" name="category" rows="1">{{ $category->category }}</textarea>
                    @error('category')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
            @else
            <h5 class="text-lg font-semibold">{{ $category->category }}</h5>
            <div class="mt-2 flex space-x-2">
                <a href="{{ route('categories.edit', $category->id) }}" class="inline-block px-2 py-1 bg-gray-800 text-white rounded-md hover:bg-gray-700 text-decoration-none">Edit</a>
                <a href="{{ route('categories.show', $category->id) }}" class="inline-block px-2 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-500 text-decoration-none">Show</a>
                <form method="post" action="{{ route('categories.destroy', $category->id) }}" class="inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="inline-block px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
