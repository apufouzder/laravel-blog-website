<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionAnswerLike;
use App\Models\ContactMessage;

class UserController extends Controller
{
    public function index(){
        // Retrieve all categories
        $categories = Category::orderBy('id', 'desc')->get();

        $recentPosts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->orderBy('posts.id', 'desc')
        ->take(3)
        ->get();

        $technologyPosts = $this->getPostsByCategory('Technology', 3);
        $reviewsPosts = $this->getPostsByCategory('Reviews', 3);
        $appsPosts = $this->getPostsByCategory('Apps', 3);
        $gamesPosts = $this->getPostsByCategory('Games', 2);
        $gadgetPostOne = $this->getPostsByCategory('Gadget', 1);
        $gadgetPostsTwo = $this->getPostsByCategory('Gadget', 2);

        return view('frontend.home', compact('categories', 'technologyPosts', 'reviewsPosts', 'appsPosts', 'gamesPosts', 'gadgetPostOne', 'gadgetPostsTwo', 'recentPosts'));
    }

    protected function getPostsByCategory($category, $limit){
        // Retrieve posts with category information
        return Post::join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->where('categories.name', $category) // Filter by category name
        ->orderBy('posts.id', 'desc') // Order by post id in descending order
        ->take($limit) // Take only the first two posts
        ->get();
    }

    // Single post method
    public function single_post_view($id){
        $post = Post::join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('posts.id', $id)
            ->first();

        $commentObj = new PostComment();

        $comments = $commentObj->join('users', 'users.id', '=', 'post_comments.user_id')
            ->select('post_comments.*', 'users.name as user_name')
            ->where('post_comments.post_id', $id)
            ->paginate(3);

        // dd($post);

        return view('frontend.single_post_view', compact('post', 'comments'));
    }


    public function filter_by_category($id){
        $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category_name')
        ->where('posts.status', 1)
        ->where('posts.category_id', $id)
        ->orderBy('posts.id', 'desc')
        ->get();

        $categoryPostCounts = Category::leftJoin('posts', 'categories.id', '=', 'posts.category_id')
        ->select('categories.id as category_id','categories.name as category_name', DB::raw('COUNT(posts.id) as post_count'))
        ->groupBy('categories.id', 'categories.name')
        ->orderBy('categories.id')
        ->get();

        return view('frontend.filter_by_category', compact('posts', 'categoryPostCounts'));
    }


    public function comment_store(Request $request, $id){
        $data = [
            'post_id' => $id,
            'user_id' => Auth()->user()->id,
            'comment' => $request->comment,
        ];

        PostComment::create($data);

        $notify = ['message' => 'Comment Added Successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    public function questions(){
        $categories = Category::all();

        $categoryPostCounts = Category::leftJoin('posts', 'categories.id', '=', 'posts.category_id')
        ->select('categories.id as category_id','categories.name as category_name', DB::raw('COUNT(posts.id) as post_count'))
        ->groupBy('categories.id', 'categories.name')
        ->orderBy('categories.id')
        ->get();

        $questions = Question::join('categories', 'categories.id', '=', 'questions.category_id')
        ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('questions.*', 'categories.name as category_name', 'users.name as user_name')
        ->orderBy('questions.id', 'desc')
        ->paginate(4);

        return view('frontend.questions', compact('questions', 'categories', 'categoryPostCounts'));
    }

    public function questions_store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
        ]);

        $data = [
            'user_id' => Auth()->user()->id,
            'category_id' => $request->category_id,
            'question' => $request->question,
        ];

        Question::create($data);

        $notify = ['message' => 'Question added successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    public function question_delete($id){
        Question::find($id)->delete();

        $notify = ['message' => 'Question delete successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    // Question Answer
    public function question_answer($id){
        $question = Question::join('categories', 'categories.id', '=', 'questions.category_id')
        ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('questions.*', 'categories.name as category_name', 'users.name as user_name')
        ->where('questions.id', $id)
        ->first();

        $answers = QuestionAnswer::join('users', 'users.id', '=', 'question_answers.user_id')
            ->select('question_answers.*', 'users.name as user_name')
            ->where('question_answers.question_id', $id)
            ->orderBy('question_answers.id', 'desc')
            ->paginate(5);

        return view('frontend.question_answer', compact('question', 'answers'));
    }

    public function question_answer_store(Request $request, $id){
        $request->validate([
            'answer' => 'required',
        ]);

        $data = [
            'question_id' => $id,
            'user_id' => Auth()->user()->id,
            'answer' => $request->answer,
        ];

        QuestionAnswer::create($data);

        $notify = ['message' => 'Answer added successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    public function question_answer_delete($id){
        QuestionAnswer::find($id)->delete();

        $notify = ['message' => 'QAnswer delete successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    // Question answer like
    public function question_answer_like($id){
        $data = [
            'user_id' => Auth()->user()->id,
            'answer_id' => $id,
        ];

        QuestionAnswerLike::create($data);

        return redirect()->back();
    }

    public function question_answer_unlike($id){
        QuestionAnswerLike::where('answer_id', $id)->where('user_id', Auth()->user()->id)->delete();

        return redirect()->back();
    }


    // Contact Message methods
    public function contact(){
        return view('frontend.contact');
    }

    public function contact_store(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        ContactMessage::create($data);

        return redirect()->back();
    }

    // About
    public function about(){
        return view('frontend.about');
    }
}
