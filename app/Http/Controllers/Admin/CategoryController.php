<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    function index(): View {
        return view('admin.category.index');
    }

    function store(Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255','unique:categories,slug'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'is_active' => ['boolean']
        ]);

        // preventing circular reference and max depth
        if ($data['parent_id'] ?? null) {
            $parent = Category::find($data['parent_id']);
            $depth = 1;
            while($parent && $parent->parent->id) {
                $depth++;
                $parent = $parent->parent;
                if ($depth >= 3) break;
            }

            if ($depth >= 3) {
                throw ValidationException::withMessages([
                    'parent_id' => 'Maximum depth reached'
                ]);
            }
        }

        $data['position'] = Category::where('parent_id', $data['parent_id'] ?? null)->max('position') + 1;

        $category = Category::create($data);

        return response()->json(['status' => 'success', 'message' => 'Category created successfully', 'category' => $category]);
    }

    function updateOrder(Request $request) {
        try {
            $tree = $request->tree;
            DB::transaction(function() use ($tree) {
                $this->updateTree($tree, null);
            });
            return response()->json(['status' => 'success', 'message' => 'Category order updated successfully']);
        } catch(\Throwable $th) {
            Log::error('Category order update Error: ', $th);
            return response()->json(['status' => 'success', 'message' => $th->getMessage()]);
        }
    }

    function updateTree($nodes, $parentId) {
        foreach ($nodes as $position => $node) {
            $category = Category::find($node['id']);
            $category->update([
                'parent_id' => $parentId,
                'position' => $position
            ]);

            if (isset($node['children']) && is_array($node['children'])) {
                $this->updateTree($node['children'], $category->id);
            }
        }
    }

    function show(int $id) {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    function getNestedCategories() {
        $categories = Category::getNested();
        return response()->json($categories);
    }
}
