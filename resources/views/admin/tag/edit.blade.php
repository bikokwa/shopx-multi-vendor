@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Tag</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-primary btn-3">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="{{ $tag->name }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" @checked($tag->is_active) name="status" id="status" />
                                    <span class="form-check-label">Active</span>
                                </label>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary" onclick="$('form').submit()">Update</button>
            </div>
        </div>
    </div>
@endsection
