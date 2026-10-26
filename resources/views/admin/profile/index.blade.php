@extends('admin.layouts.app')

@section('contents')
<div class="container-xl">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Profile</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-input-image id="image-preview" name="avatar" :image="asset(auth('admin')->user()->avatar)" />
                            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label required">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ auth('admin')->user()->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label required">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ auth('admin')->user()->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Account</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Password</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf
                @method('PUT')
                <div class="row mt-30">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label required">Current Password</label>
                            <input required="" class="form-control" name="current_password"
                                type="password" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label required">New Password</label>
                            <input required="" class="form-control" name="password"
                                type="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label required">Confirm Password</label>
                            <input required="" class="form-control" name="password_confirmation"
                                type="password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false                 // Default: false
  });
});
</script>
@endpush
