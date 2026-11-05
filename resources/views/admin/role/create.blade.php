@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Roles</h3>
                <div class="card-actions">
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Back
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
                                <input type="text" class="form-control" placeholder="" name="role" value="">
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class="col-md-4 mb3">
                                <h3>{{ $groupName }}</h3>
                                @foreach ($permission as $item)
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" value="{{ $item->name }}" name="permissions[]">
                                        <span class="form-check-label">{{ $item->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </form>

                <div class="card-footer text-end">
                    <button onclick="$('form').submit()" type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
            </div>
        </div>
    </div>
@endsection


