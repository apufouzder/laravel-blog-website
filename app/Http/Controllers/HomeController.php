<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Question;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){

        $totalPosts = Post::all()->count();
        $totalQuestion = Question::all()->count();
        $totalCategory = Category::all()->count();

        $categoryPostCounts = Category::leftJoin('posts', 'categories.id', '=', 'posts.category_id')
        ->select('categories.id as category_id', 'categories.name as category_name', DB::raw('COUNT(posts.id) as post_count'))
        ->groupBy('categories.id', 'categories.name')
        ->orderBy('categories.id')
        ->get();

        $categoryQuestionCounts = Category::Join('questions', 'categories.id', '=', 'questions.category_id')
        ->select('categories.id as category_id','categories.name as category_name', DB::raw('COUNT(questions.id) as question_count'))
        ->groupBy('categories.id', 'categories.name')
        ->orderBy('categories.id')
        ->get();

        $recentPosts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->orderBy('posts.id', 'desc')
        ->take(4)
        ->get();


        if(Auth::id()){
            $userType = Auth()->user()->user_type;

            if($userType == 'user'){
                return view('dashboard');
            }
            else if($userType == 'admin'){
                return view('admin.dashboard', compact('totalPosts', 'totalQuestion', 'totalCategory', 'categoryPostCounts', 'categoryQuestionCounts', 'recentPosts'));
            }
            else{
                return redirect()->back();
            }
        }
    }
}
