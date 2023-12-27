<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlgoCategoryController extends Controller
{
    
    /*
    public function index(Request $request) {
        $perPage = $request->perPage ?? 5;
        $keyword = $request->keyword;
    
        $query = BlogCategory::query();
       // $query = BlogCategory::all();
    
        if ($keyword) {
            $query = $query->where('category_name', 'like', '%' . $keyword . '%');
        }
        return $query->orderByDesc('id')->paginate($perPage)->withQueryString();
        
      //  return view('admin.blogs.categories', compact('query'));

    } */

    public function index(Request $request) {
        $perPage = $request->perPage ?? 5;
        $keyword = $request->keyword;
    
        $query = BlogCategory::query();
    
        if ($keyword) {
            $query = $query->where('category_name', 'like', '%' . $keyword . '%');
        }
    
        $categories = $query->orderByDesc('id')->paginate($perPage)->withQueryString();
        //dd($categories);
        return view('admin.blogs.categories', compact('categories'));
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
    
    public function update(Request $request, BlogCategory $category) {
        $validated = $request->validate([
            'category_name' => 'required|string|max:50'
        ]);

        $category->update($validated);

        return response()->json($category);
    }

    public function destroy(BlogCategory $category) {
        $category->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
