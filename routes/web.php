<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Rengga Rendi Saputra', "title" => "About Page"]);
});

Route::get('/posts', function () {
    return view('posts', ["title" => "Blog", 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Rengga',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores obcaecati rem
            soluta animi architecto
            ut, quaerat alias, quisquam consequatur, quibusdam quis nam debitis eum est voluptatibus molestias.
            Inventore, omnis! In?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Rendi',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nulla, dolorum aspernatur, temporibus dolor similique ipsam beatae praesentium veniam dolore suscipit obcaecati odit deserunt. Ipsum odio minima aspernatur optio minus.'
        ]
    ]]);
});

Route::get('/posts/{id}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Rengga',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores obcaecati rem
            soluta animi architecto
            ut, quaerat alias, quisquam consequatur, quibusdam quis nam debitis eum est voluptatibus molestias.
            Inventore, omnis! In?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Rendi',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nulla, dolorum aspernatur, temporibus dolor similique ipsam beatae praesentium veniam dolore suscipit obcaecati odit deserunt. Ipsum odio minima aspernatur optio minus.'
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});
