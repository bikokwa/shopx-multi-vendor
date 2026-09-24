@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Create Product</h3>
                        <div class="card-actions">
                            <a href="{{ route('admin.role.index') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="" value="" />
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Description</label>
                                <textarea name="description" id="editor"></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Short Description</label>
                                <textarea name="short_description" id="short-editor"></textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary" onclick="$('form').submit()">Create</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Product</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
