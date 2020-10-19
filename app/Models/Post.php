<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Favoritable, RecordsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'body',
        'thumbnail',
        'comment_count',
        'visits',
        'category_id',
        'best_comment_id',
        'user_id'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['category', 'comments'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['favoritesCount', 'isFavorited'];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->comments->each->delete();
        });

        static::created(function ($post) {
            $post->update(['slug' => $post->title]);
        });
    }

    /**
     * Get the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) 
            $slug = "{$slug}-{$this->id}";

        $this->attributes['slug'] = $slug;
    }

    /**
     * A post belongs to a user.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A post belongs to a category.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A post may have many comments.
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    /**
     * Add a comment to the post.
     *
     * @param  array $comment
     * @return Model
     */
    public function addComment($comment)
    {
        $comment = $this->comments()->create($comment);

        return $comment;
    }

}
