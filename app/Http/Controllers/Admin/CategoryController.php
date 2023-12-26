<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderby('id', 'desc')->get();
        // $categories = Category::get();

        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        Category::create($data);

        $notify = ['message' => 'Category Create Successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id .'|max:255',
            // 'name' => 'required|unique:categories,name,|max:255',
            'description' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $category->update($data);

        $notify = ['message' => 'Category Update Successfully!', 'alert_type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        $notify = ['message' => 'Category Delete Successfully!', 'alert_type' => 'success'];

        return redirect()->back()->with($notify);
    }
}
