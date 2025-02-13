<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostTag extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'status'];

    /**
     * Retrieve posts by tag slug.
     */
    public static function getBlogByTag($slug)
    {
        return self::with('posts')->where('slug', $slug)->first();
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag_pivot', 'post_tag_id', 'post_id');
    }

}
