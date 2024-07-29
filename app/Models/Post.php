<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];

    protected $guarded = [];

    public function getRouteKeyname(): string
    {
        return 'slug';
    }

    public function getThumbnailAttribute($thumbnail)
    {
        return is_null($thumbnail) ? '/images/illustration-1.png' : '/storage/' . $thumbnail;
    }


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function scopeFilter(Builder $query, array $filters): void
    {
        if(isset($filters['search'])){
            $search = $filters['search'];
            $query->where(function(Builder $query) use($search){
                $query
                    ->where('title', 'like', "%$search%")
                    ->orWhere('body', 'like', "%$search%");
            });
        }

        if(isset($filters['category'])){
            $category = $filters['category'];
            $query->whereHas('category', function(Builder $query) use ($category){
                $query->where('slug', $category);
            });
        }

        if(isset($filters['author'])){
            $author = $filters['author'];
            $query->whereHas('author', function(Builder $query) use ($author){
                $query->where('username', $author);
            });
        }
    }
}
