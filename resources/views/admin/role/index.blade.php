@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Roles</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary btn-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Create Role
                    </a>
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
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td><span class="badge bg-primary-lt">{{ $role->permissions_count }}</span></td>
                                <td>
                                    @if ($role->name != 'Super Admin')
                                        <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.role.destroy', $role) }}" class="btn btn-danger btn-sm delete-item">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No roles found.</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    {{-- {{ $kycRequests->links() }} --}}
                  </div>
            </div>
        </div>
    </div>
@endsection


