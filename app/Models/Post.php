<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'slug',
        'description',
        'photo',
        'youtube_link',
        'quote',
        'post_cat_id',
        'status'
    ];

    /**
     * Relationship with PostCategory (Many-to-One)
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_cat_id');
    }

    /**
     * Relationship with PostTag (Many-to-Many)
     */
    public function tags()
{
    return $this->belongsToMany(PostTag::class, 'post_tag_pivot', 'post_id', 'post_tag_id');
}


    /**
     * Get all posts with category & tags
     */
    public static function getAllPost()
    {
        return self::with(['category', 'tags'])->orderBy('id', 'DESC')->paginate(10);
    }

    /**
     * Get single post by slug
     */
    public static function getPostBySlug($slug)
    {
        return self::with(['tags'])->where('slug', $slug)->where('status', 'active')->first();
    }

    /**
     * Get posts by tag slug
     */
    public static function getBlogByTag($slug)
    {
        return self::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(8);
    }

    /**
     * Count active posts
     */
    public static function countActivePost()
    {
        return self::where('status', 'active')->count();
    }
}
