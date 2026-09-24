@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Products</h3>
                <div class="card-actions">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Create Product
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.products.create') }}" class="dropdown-item">Physical</a></li>
                            <li><a href="#" class="dropdown-item">Digital</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Role Name</th>
                          <th>Permissions</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @forelse ($roles as $role)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td><span class="badge bg-primary-lt">{{ $role->permissions_count }}</span></td>
                            <td>
                              @if ($role->name != 'Super Admin')
                                <a href="{{ route('admin.role.edit', $role) }}">Edit</a>
                                <a href="{{ route('admin.role.destroy', $role) }}" class="text-danger delete-item">Delete</a>
                              @endif
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="4" class="text-center">No Roles</td>
                          </tr>
                        @endforelse --}}
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                  </div>
            </div>
        </div>
    </div>
@endsection

