@php
    $forum_type_id = request()->get('forum_type_id');
@endphp

@extends('layouts.header')

@section('content')
<div class="container py-4">
    <h3 class="font-bold text-2xl text-gray-800 mb-4">Share Your Thread</h3>
    <hr class="mb-4">

    <div class="mx-auto max-w-md">
        <form action="{{ route('threads.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="title" name="title" required>
                @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="content" name="content" rows="3" style="overflow-wrap: break-word;" required></textarea>
                @error('content')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
            
                      
            
            <div class="mb-4">
                <input type="hidden" class="form-control" id="forum_type_id" name="forum_type_id" value="{{ $forum_type_id }}">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Thread Category</label>
                <select name="thread_category_id" id="category_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="border: 1px solid;">
                    <option value="">Select Category</option>
                    @foreach ($threadCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                    <option value="custom">Custom</option>
                </select>
                <div id="custom_category_form" style="display: none;">
                    <label for="custom_thread_category" class="block text-sm font-medium text-gray-700">Custom Category</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="custom_thread_category" name="custom_thread_category">
                </div>
                @error('thread_category_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <script>
                document.getElementById('category_id').addEventListener('change', function() {
                    var customForm = document.getElementById('custom_category_form');
                    if (this.value === 'custom') {
                        customForm.style.display = 'block';
                        customForm.querySelector('input').setAttribute('required', 'required');
                    } else {
                        customForm.style.display = 'none';
                        customForm.querySelector('input').removeAttribute('required');
                    }
                });
            </script>
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-2 rounded-md">Create Thread</button>
            </div>
        </form>
    </div>
</div>
<hr>
@endsection

<script>
    const textarea = document.getElementById('content');

    textarea.addEventListener('input', function() {
        if (this.scrollHeight > this.clientHeight) {
            this.style.height = this.scrollHeight + 'px';
        }
    });
</script>

