@php
    $forum_type_id = request()->get('forum_type_id');
@endphp

@extends('layouts.header')

@section('content')
<div class="container py-4">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-6">
            @include('shared.success_message')
            <div class="mt-3">
                @include('threads.shared.thread_card')
                @include('threads.shared.comment_box')
            </div>
            <hr>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('forum.shared.category')
        </div>
    </div>
</div>
@endsection

@extends('layouts.header')

@section('content')
<div class="container bg-gray-100 shadow-lg px-4 py-2" style="max-width: 24cm;">
    @foreach($notifications as $notification)
    <div class="mt-2 px-6 py-4 bg-white rounded-lg shadow-lg w-full mb-3{{ $notification->isRead ? '' : ' bg-secondary' }} bg-opacity-50">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/893/893257.png" alt="Messages Icon" class="w-6 h-6 mr-3">
                <h3 class="font-bold text-lg text-gray-800">Notifications</h3>
            </div>
            <p class="text-sm text-gray-500">
                <time datetime="{{ $notification->created_at->toIso8601String() }}" title="{{ $notification->created_at->toIso8601String() }}">
                    {{ $notification->created_at->format('F j, Y \a\t h:i A') }}
                </time>
            </p>
        </div>
        <div class="flex items-center mt-2">
            <img class="w-12 h-12 rounded-full" src="{{ $notification->user->getImageURL() }}" alt="{{ $notification->user->name }}">
            <p class="ml-4 text-base">{{ $notification->keterangan }}</p>
        </div>

