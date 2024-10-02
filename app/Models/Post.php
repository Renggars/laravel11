<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
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
    }

    public static function find($slug): array
    {
        // $post = Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        // arrow function
        $post =  Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
