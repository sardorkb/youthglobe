@extends('admin.layouts.master')
@section('title', 'Students list | Youth Glove')
@section('main-content')
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Student list</h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white">
            <h4>Student List</h4>
        </div>
        <div class="card-body">
            <!-- Filters Section -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <button class="btn btn-sm btn-success">Active Students</button>
                    <button class="btn btn-sm btn-secondary">Inactive Students</button>
                </div>
                <div>
                    <form class="d-inline" method="GET" action="{{ route('admin.users.index') }}">
                        <input type="text" name="search" class="form-control form-control-sm d-inline-block"
                            style="width: 200px;" placeholder="Search by name or email">
                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
                    </form>
                    <a href="#" class="btn btn-sm btn-primary">+ Add Student</a>
                </div>
            </div>
            <!-- Student Table -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone_number }}</td>
                                <td>
                                    <span class="badge {{ $student->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($student->status) }}
                                    </span>
                                </td>
                                <td>{{ $student->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-3">
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
@endsection
