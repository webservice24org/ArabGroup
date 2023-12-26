<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlgoCategoryController extends Controller
{
    
    public function index(Request $request) {
        $perPage = $request->perPage ?? 5;
        $keyword = $request->keyword;
    
        $query = BlogCategory::query();
    
        if ($keyword) {
            $query = $query->where('category_name', 'like', '%' . $keyword . '%');
            // $query->orWhere('email', 'like', '%' . $keyword . '%');
        }
    
        $categories = $query->orderByDesc('id')->paginate($perPage);
    
        // You can customize the view name based on your folder structure
        return view('admin/blogs/categories', compact('categories'));
            // ->withQueryString();
    }

    public function show(BlogCategory $category) {
        return $category;
    }
    //Store News Customer
    function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|string|max:50'
        ]);

        $category = BlogCategory::create($validated);
        return response()->json($category, Response::HTTP_CREATED);
    }

}
