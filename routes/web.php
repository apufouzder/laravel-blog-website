<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/', [UserController::class, 'index']);
Route::get('/post/category/{id}', [UserController::class, 'filter_by_category'])->name('filter_by_category');
Route::get('/post/{id}', [UserController::class, 'single_post_view'])->name('single_post_view');
// Contact Routes
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::post('/contact/store', [UserController::class, 'contact_store'])->name('contact_store');

Route::get('/about', [UserController::class, 'about'])->name('about');

// View Auth Routes
Route::middleware('auth')->group(function () {
    Route::post('/post/{id}/comment/store', [UserController::class, 'comment_store'])->name('comment_store');

    Route::get('/questions', [UserController::class, 'questions'])->name('questions');
    Route::post('/questions/store', [UserController::class, 'questions_store'])->name('questions_store');
    Route::delete('/questions/{id}/delete', [UserController::class, 'question_delete'])->name('question_delete');

    Route::get('/questions/answer/{id}', [UserController::class, 'question_answer'])->name('question_answer');
    Route::post('/questions/answer/{id}/store', [UserController::class, 'question_answer_store'])->name('question_answer_store');
    Route::delete('/questions/answer/{id}/delete', [UserController::class, 'question_answer_delete'])->name('question_answer_delete');

    Route::get('/questions/answer/{id}/like', [UserController::class, 'question_answer_like'])->name('question_answer_like');
    Route::get('/questions/answer/{id}/unlike', [UserController::class, 'question_answer_unlike'])->name('question_answer_unlike');
});



Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin Dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/dashboard/categories', CategoryController::class);
    Route::resource('/dashboard/create-blog', PostController::class);
    Route::resource('/dashboard/message', ContactMessageController::class);
});

// User Routers
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
