<div class="card">
    <div class="card-body">
        <h4 class="text-lg font-semibold mb-4">Make a New Category</h4>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="flex flex-col mb-4">
                <textarea id="category" name="category" rows="3" class="form-textarea mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter Category"></textarea>
                @error('category')
                <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create</button>
            </div>
        </form>
    </div>
</div>
