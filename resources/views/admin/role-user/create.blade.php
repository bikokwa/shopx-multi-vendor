@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Role User</h3>
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
                <form action="{{ route('admin.role-user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control" placeholder="" name="name" value="">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-control" placeholder="" name="email" value="">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Password</label>
                                <input type="password" class="form-control" placeholder="" name="password" value="">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="" name="password_confirmation" value="">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Role</label>
                                <select name="role" class="form-select">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-footer text-end">
                    <button onclick="$('form').submit()" type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
            </div>
        </div>
    </div>
@endsection


