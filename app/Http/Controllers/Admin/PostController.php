<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $objPost = new Post();

        $posts = $objPost->join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->get();

        return view('admin.create-blog', compact('categories', 'posts'));
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
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ];

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('post_thumbnails'), $filename);
            $data['thumbnail'] = $filename;
        }

        Post::create($data);

        $notify = ['message' => 'Blog Create Successfully!', 'alert-type' => 'success'];

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
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ];

        if($request->hasFile('thumbnail')){
            if($request->old_thumbnail){
                File::delete(public_path('post_thumbnails/' . $request->old_thumbnail));
            }

            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('post_thumbnails'), $filename);
            $data['thumbnail'] = $filename;
        }

        Post::where('id', $id)->update($data);

        $notify = ['message' => 'Blog Update Successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post->thumbnail){
            File::delete(public_path('post_thumbnails/' . $post->thumbnail));
        }
        $post->delete();
        $notify = ['message' => 'Blog Delete Successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }
}
