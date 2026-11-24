@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Create Role</h3>
                        <div class="card-actions">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Back
                            </a>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control" name="name" value="">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Slug</label>
                                <input type="text" class="form-control" name="slug" value="">
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Short Description</label>
                                <textarea id="short-editor" name="short_description"></textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Description</label>
                                <textarea id="editor" name="description"></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">Overview</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">SKU</label>
                                    <input type="text" class="form-control" name="sku" value="">
                                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="">
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Special Price</label>
                                    <input type="text" class="form-control" name="special_price" value="">
                                    <x-input-error :messages="$errors->get('special_price')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">From Date</label>
                                    <input type="text" class="form-control" name="from_date" value="">
                                    <x-input-error :messages="$errors->get('from_date')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="text" class="form-control" name="to_date" value="">
                                    <x-input-error :messages="$errors->get('to_date')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <span class="form-check-label">Manage Stock</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control" name="qty" value="">
                                        <x-input-error :messages="$errors->get('qty')" class="mt-2" />
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
                                                <label class="form-check">
                                                    <input type="radio" name="radios" class="form-check-input">
                                                    <span class="form-check-label">In Stock</span>
                                                </label>
                                                <label class="form-check">
                                                    <input type="radio" name="radios" class="form-check-input">
                                                    <span class="form-check-label">Out Of Stock</span>
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
                                <label class="form-check form-switch form-switch-3">
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
                                            @foreach ($category->children_nested as $child)
                                            <li>
                                                <label for="" class="form-check category-wrapper">
                                                    <input type="checkbox" class="form-check-input category-check">
                                                    <span class="form-check-label category-label">{{ $child->name }}</span>
                                                </label>
                                                @if ($child->children_nested && $child->children_nested->count() > 0)
                                                <ul class="list-unstyled ms-4 mt-2">
                                                    @foreach ($child->children_nested as $subChild)
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
                                <select name="brand" class="form-control select2" id="">
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
                                    <input type="checkbox" class="form-check-input">
                                    <span class="form-check-label">Hot</span>
                                </label>
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <span class="form-check-label">New</span>
                                </label>
                                <x-input-error :messages="$errors->get('label')" class="mt-2" />
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
                                <select name="tags[]" class="form-control select2" multiple="multiple" id="">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('tag')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3 row">
                                <button onclick="$('form').submit()" type="submit" class="btn btn-primary mt-3">Create</button>
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
        })
        function updateParents($input) {
            const $li = $input.closest('li').parent().closest('li');
            if($li.length) {
                const $siblings = $li.find('> ul > li input.category-check');
                const checkedCount = $siblings.filter(':checked').length;
                const $parent = $li.find('> label > input.category-check');
                if (checkedCount === 0) {
                    $parent.prop('checked', false).prop('indeterminate', false);
                } else if (checkedCount === $siblings.length) {
                    $parent.prop('checked', true).prop('indeterminate', false);
                }else {
                    $parent.prop('checked', false).prop('indeterminate', true);
                }
                updateParents($parent);
            }
        }
        updateParents($(this));
    })

    // search logic
    $('#category-search').on('input', function() {
        const query = $(this).val().toLowerCase();

        $('#category-tree li').each(function() {
            const label = $(this).find('> label > .category-label').text().toLowerCase();

            if (label.includes(query)) {
                $(this).removeClass('d-none');
                // show all ancestors
                $(this).parents('li').removeClass('d-none');
            } else {
                $(this).addClass('d-none');
            }
        })

        // if query is empty, show all
        if (query === '') {
            $('#category-tree li').removeClass('d-none');
        }
    })
</script>
@endpush
