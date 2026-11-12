@extends('admin.layouts.app')

@section('contents')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Categories</span>
                        <button class="btn btn-primary">New</button>
                    </div>
                    <div class="card-body">
                        <div id="category-tree" class="dd"></div>
                        <div id="tree-loading" class="text-center my-2">
                            <div class="spinner-border"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Create Category</span>
                    </div>
                    <div class="card-body">
                        <form action="" id="category-form">
                            <div class="mb-2">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="parent_id" class="form-label">Parent Category <span class="text-danger">*</span></label>
                                <select name="parent_id" class="form-select" id="parent_id">
                                    <option value="">Select Parent</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input type="checkbox" checked class="form-check-input" name="is_active" id="is_active">
                                    <span class="form-check-label">Active</span>
                                </label>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                                <button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
                                <button type="button" class="btn btn-secondary" id="btn-cancel">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
