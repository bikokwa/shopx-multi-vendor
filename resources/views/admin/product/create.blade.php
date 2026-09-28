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
                                    <input type="text" class="form-control datepicker" name="from_date" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('from_date')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="text" class="form-control datepicker" name="to_date" placeholder="" value="" />
                                    <x-input-error :messages="$errors->get('to_date')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-check">
                                            <input type="checkbox" class="form-check-input manage-stock-check">
                                            <span class="form-check-label">Manage Stock</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 manage-stock d-none">
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
                                <select name="store" class="form-control select2" id="">
                                    <option value="">Select a store</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
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
                                <label name="is_featured" class="form-check form-switch form-switch-3">
                                    <input type="checkbox" class="form-check-input">
                                    <span class="form-check-label">Enable</span>
                                </label>
                                <x-input-error :messages="$errors->get('is_featured')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                    </div>
                    <div class="card-body" style="height: 400px; overflow-y: scroll;">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="category-search" placeholder="Search Category">
                                </div>
                                <ul class="list-unstyled" id="category-tree">
                                    @foreach ($categories as $category)
                                    <li>
                                        <label for="" class="form-check category-wrapper">
                                            <input type="checkbox" class="form-check-input category-check">
                                            <span class="form-check-label category-label">{{ $category->name }}</span>
                                        </label>
                                        @if ($category->children_nested && $category->children_nested->count() > 0)
                                        <ul class="list-unstyled ms-4 mt-2">
                                            @foreach($category->children_nested as $child)
                                            <li>
                                                <label for="" class="form-check category-wrapper">
                                                    <input type="checkbox" class="form-check-input category-check">
                                                    <span class="form-check-label category-label">{{ $child->name }}</span>
                                                </label>
                                                @if ($child->children_nested && $child->children_nested->count() > 0)
                                                <ul class="list-unstyled ms-4 mt-2">
                                                    @foreach($child->children_nested as $subChild)
                                                    <li>
                                                        <label for="" class="form-check category-wrapper">
                                                            <input type="checkbox" class="form-check-input category-check">
                                                            <span class="form-check-label category-label">{{ $subChild->name }}</span>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
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
                                <select name="brand" class="form-control select2">
                                    <option value="">Select a brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
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
                                <select name="tags" class="form-control select2" multiple="multiple">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary" onclick="$('form').submit()">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).on('change', '.category-check', function() {
        const isChecked = $(this).is(':checked');
        $(this).closest('li').find('input.category-check').each(function() {
            this.checked = isChecked;
            this.indeterminate = false;
        });

        function updateParents($input) {
            const $li = $input.closest('li').parent().closest('li');
            if ($li.length) {
                const $siblings = $li.find('> ul > li input.category-check');
                const checkedCount = $siblings.filter(':checked').length;
                const $parent = $li.find('> label > input.category-check');

                if (checkedCount === 0) {
                    $parent.prop('checked', false).prop('indeterminate', false);
                } else if (checkedCount === $siblings.length) {
                    $parent.prop('checked', true).prop('indeterminate', false);
                } else {
                    $parent.prop('checked', false).prop('indeterminate', true);
                }

                updateParents($parent);
            }
        }
        updateParents($(this));
    })

    // search logic
    $('#category-search').on('input', function() {
        const query = $(this).val().toLowerCase().trim();
        $('#category-tree li').each(function() {
            const $li = $(this);
            const label = $li.find('> label > .category-label').text().toLowerCase();
            const hasMatchingChild = $li.find('ul li').filter(function() {
                return $(this).find('> label > .category-label').text().toLowerCase().includes(query);
            }).length > 0;

            if (query === '' || label.includes(query) || hasMatchingChild) {
                $li.removeClass('d-none');
            } else {
                $li.addClass('d-none');
            }
        });
    })

    $('.manage-stock-check').on('change', function() {
        if ($(this).is(':checked')) {
            $('.manage-stock').removeClass('d-none');
        } else {
            $('.manage-stock').addClass('d-none');
        }
    })
</script>
@endpush
