<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Rengga Rendi Saputra', "title" => "About Page"]);
});

Route::get('/posts', function () {

    // eager loading (n + 1 problem) manual, kalau default di providers
    // $posts = Post::with(['author', 'category'])->latest()->get();
    // $posts = Post::latest()->get();

    // jika ingin semua data tampil ganti pagination() dengan get(), sebaliknya jika ingin menggunakan pagination ganti get() dengan paginate() atau simplePagination()
    return view('posts', ['title' => "Blog", 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // lazy eager loading (n + 1 problem)
    // $posts = $user->posts->load('category', 'author');

    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // lazy eager loading (n + 1 problem)
    // $posts = $category->posts->load('category', 'author');

    return view('posts', ['title' => 'Articles in : ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});
