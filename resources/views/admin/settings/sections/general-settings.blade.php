@extends('admin.settings.index')

@section('settings_contents')
<div class="card-body">
    <h2 class="mb-4">General Settings</h2>

    <form action="{{ route('admin.settings.general') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-12">
                <div class="form-label">Site Name</div>
                <input type="text" class="form-control" value="{{ config('settings.site_name') }}" name="site_name">
            </div>
            <div class="col-md-6">
                <div class="form-label">Site Email</div>
                <input type="text" class="form-control" value="{{ config('settings.site_email') }}" name="site_email">
            </div>
            <div class="col-md-6">
                <div class="form-label">Site Phone</div>
                <input type="text" class="form-control" value="{{ config('settings.site_phone') }}" name="site_phone">
            </div>
        </div>
        <div class="btn-list justify-content-end mt-5">
            <button type="submit" class="btn btn-primary btn-2"> Submit </button>
        </div>
    </form>

</div>
@endsection
