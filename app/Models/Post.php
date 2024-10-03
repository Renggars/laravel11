<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    // Jika ingin ganti default nama table database, default sama dengan nama classnya (post)
    // protected $table = 'blog_posts';

    // Jika ingin ganti primary key tambahkan code dibawah, dafaultnya menggunakan (id)
    // protected $primaryKey = 'post_id';

    protected $fillable = ['title', 'author', 'slug', 'body'];

    // eager loading dengan default (n + 1 problem)
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }


    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    // App\Models\Post::create([
    // 'title' => 'Judul Artikel 2',
    // 'author' => 'Rendi',
    // 'slug' => 'judul-artikel-2',
    // 'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti ab distinctio rem a velit enim odio ipsam fuga ipsum doloremque inventore dolorum cumque itaque explicabo, non libero. Obcaecati, assumenda officiis!'
    // ]);

    // App\Models\Post::all(); 

    // $post =  App\Models\Post::all(); 
}
