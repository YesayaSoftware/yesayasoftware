<?php

namespace App\Models;

use App\Models\Traits\Favoritable;
use App\Models\Traits\RecordsActivity;
use App\Models\Traits\Thumbnail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Favoritable, RecordsActivity, Thumbnail;

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
    protected $with = ['category', 'user', 'comments'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'favorites_count',
        'is_favorited',
        'thumbnail_url',
        'created_at_timestamp',
        'updated_at_timestamp',
        'clear_body',
        'read_time',
        'created_at_date'
    ];

    protected $hidden = ['thumbnail'];

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
    public function getRouteKeyName(): string
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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A post belongs to a category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->setEagerLoads([]);
    }

    /**
     * A post may have many comments.
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc')->setEagerLoads([]);
    }

    /**
     * Add a comment to the post.
     *
     * @param array $comment
     * @return Model
     */
    public function addComment(array $comment): Model
    {
        $comment = $this->comments()->create($comment);

        return $comment;
    }

    /**
     * Convert created at to timestamps.
     *
     * @return int
     */
    public function getCreatedAtTimestampAttribute(): int
    {
        return $this->created_at->timestamp;
    }

    /**
     * Convert updated at to timestamps.
     *
     * @return int
     */
    public function getUpdatedAtTimestampAttribute(): int
    {
        if($this->updated_at)
            return $this->updated_at->timestamp;
        else
            return 0;
    }

    /**
     * Return the created at in diff for humans format
     *
     * @return mixed
     */
    public function getCreatedAtDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function getClearBodyAttribute(): string
    {
        return strip_tags($this->body);
    }

    public function getReadTimeAttribute(): string
    {
        $word = str_word_count(strip_tags($this->body));
        $m = floor($word / 230);
//        $s = floor($word % 200 / (200 / 60));
        $est = $m . ' minute' . ($m == 1 ? '' : 's');

        return $est;
    }
}
