@extends('layouts.header')

@section('content')
<div class="container py-4">
    <div class="flex flex-wrap -mx-4">
        @include('layouts.sidebar_cluster')

        <div class="w-full md:w-2/3 px-4">
            <div class="card shadow-lg">
                <div class="card-header bg-gray-100 border-b-2 border-gray-200 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">Manage Role</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('updateRole') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <label for="user_id" class="text-sm font-semibold mb-2">Select User</label>
                            <select name="user_id" id="user_id" required class="form-select border border-gray-300 rounded-md shadow-sm">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="role_id" class="text-sm font-semibold mb-2">Select Role</label>
                            <select name="role_id" id="role_id" required class="form-select border border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Role</option>
                                @foreach ($roles->where('id', '!=', 3) as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Update Role" class="btn btn-primary bg-blue-700">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
