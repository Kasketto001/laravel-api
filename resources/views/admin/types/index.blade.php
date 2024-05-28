@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex justify-content-between">
        <h1>All Types</h1>
        <button type="button" class="btn btn-primary d-flex justify-content-center align-items-center px-4" data-bs-toggle="modal" data-bs-target="#addTypeModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>

    <div class="container mt-3">
        <div class="table-responsive rounded-2">
            <table class="table table-dark p-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr>
                            <form action="{{ route('admin.types.update', $type) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>{{ $type->id }}</td>
                                <td>
                                    <input type="text" name="name" value="{{ $type->name }}" class="form-control">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">Update</button>
                            
                            </form>
                            
                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No types found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Type Modal -->
    <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTypeModalLabel">Add New Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.types.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
