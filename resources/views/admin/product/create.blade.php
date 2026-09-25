@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
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
                <div class="card mb-3">
                    <div class="card-header">
                        Overview
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">SKU</label>
                                    <input type="text" class="form-control" name="sku" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Special Price</label>
                                    <input type="text" class="form-control" name="special_price" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('special_price')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">From Date</label>
                                    <input type="text" class="form-control" name="from_date" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('from_date')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="text" class="form-control" name="to_date" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('to_date')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <span class="form-check-label">Manage Stock</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" placeholder="" value="" />
                                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Stock Status</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-check">
                                                    <input type="radio" name="radios" checked="" class="form-check-input">
                                                    <span class="form-check-label">In Stock</span>
                                                </label>
                                                <label for="" class="form-check">
                                                    <input type="radio" name="radios" checked="" class="form-check-input">
                                                    <span class="form-check-label">Out of Stock</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <select name="status" class="form-control" id="">
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Store</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <select name="store" class="form-control" id="">
                                    <option value="">Select a store</option>
                                </select>
                                <x-input-error :messages="$errors->get('store')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Is Featured</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <select name="is_featured" class="form-control" id="">
                                    <option value="">Select a store</option>
                                </select>
                                <x-input-error :messages="$errors->get('is_featured')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <select name="category" class="form-control" id="">
                                    <option value="">Select a category</option>
                                </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Brand</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <select name="brand" class="form-control" id="">
                                    <option value="">Select a brand</option>
                                </select>
                                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Label</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-label">Hot</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-label">New</span>
                                </label>
                                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Tags</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <select name="tags" class="form-control" id="">
                                    <option value="">Select Tags</option>
                                </select>
                                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
