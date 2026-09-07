@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Roles</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary btn-3">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Create Role
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Role Name</label>
                                <input type="text" class="form-control" name="role" placeholder="" value="" />
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class="col-md-4 mb-3">
                                <h3 class="">{{ $groupName }}</h3>
                                <div class="">
                                    @foreach ($permission as $item)
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $item->name }}" />
                                            <span class="form-check-label">{{ $item->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary" onclick="$('form').submit()">Create</button>
            </div>
        </div>
    </div>
@endsection
