@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Role Users</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role-user.create') }}" class="btn btn-primary btn-3">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Create User
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($admins as $admin)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                              @foreach ($admin->getRoleNames() as $role)
                                <span class="badge bg-primary-lt">{{ $role }}</span>
                              @endforeach
                            </td>
                            <td>
                              @if (!$admin->hasRole('Super Admin'))
                                <a href="{{ route('admin.role-user.edit', $admin) }}">Edit</a>
                                <a href="{{ route('admin.role-user.destroy', $admin) }}" class="text-danger delete-item">Delete</a>
                              @endif
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="4" class="text-center">No Roles</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                  </div>
            </div>
        </div>
    </div>
@endsection

