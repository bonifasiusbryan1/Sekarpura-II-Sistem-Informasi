@extends('layouts.header')

@section('content')
<div class="container py-4">
    <div class="flex flex-wrap -mx-4">
        @include('layouts.sidebar_cluster')

        <div class="w-full lg:w-3/4 px-4">
            <div class="card shadow-lg">
                <div class="card-header bg-gray-100 border-b-2 border-gray-200 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">Users Account</h2>
                    <form id="searchForm" class="mt-4">
                        <div class="flex items-center">
                            <input type="text" class="form-input flex-grow w-full mr-2 border border-gray-300 rounded-md py-2 px-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Search by name, NIP, or email" name="search" id="searchInput">
                            <button class="btn btn-primary bg-blue-700" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">NIP</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Unit</th>
                                    <th class="px-4 py-2">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->nip }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">{{ $user->unit }}</td>
                                    <td class="border px-4 py-2">{{ $user->roles->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchForm = document.getElementById('searchForm');
        const usersTable = document.getElementById('usersTable');
        const searchInput = document.getElementById('searchInput');

        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const searchQuery = searchInput.value.trim().toLowerCase();

            Array.from(usersTable.getElementsByTagName('tr')).forEach(function(row, index) {
                if (index === 0) return; // Skip table header row
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let i = 0; i < cells.length; i++) {
                    const cellText = cells[i].textContent.toLowerCase().trim();
                    if (cellText.includes(searchQuery)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        searchInput.addEventListener('input', function() {
            const searchQuery = searchInput.value.trim().toLowerCase();

            Array.from(usersTable.getElementsByTagName('tr')).forEach(function(row, index) {
                if (index === 0) return; // Skip table header row
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let i = 0; i < cells.length; i++) {
                    const cellText = cells[i].textContent.toLowerCase().trim();
                    if (cellText.includes(searchQuery)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
