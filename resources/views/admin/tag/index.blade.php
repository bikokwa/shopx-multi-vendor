@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Tags</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary btn-3">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Create Tag
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
                          <th>Status</th>
                          <th class="w-100px"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($tags as $tag)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                @if ($tag->is_active == 1)
                                    <span class="badge bg-primary-lt">Active</span>
                                @else
                                    <span class="badge bg-danger-lt">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.tags.edit', $tag) }}">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="{{ route('admin.tags.destroy', $tag) }}" class="text-danger delete-item">
                                    <i class="ti ti-trash"></i>
                                </a>

                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="4" class="text-center">No Tags Available</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    {{ $tags->links() }}
                  </div>
            </div>
        </div>
    </div>
@endsection

