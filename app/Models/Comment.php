<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'post_id',
        'user_id'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'created_at_timestamp',
        'updated_at_timestamp',
        'created_at_date'
    ];

    /**
     * Boot the comment instance.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($comment) {
            $comment->post->increment('comment_count');
        });

        static::deleted(function ($comment) {
            $comment->post->decrement('comment_count');
        });
    }

    /**
     * A comment belongs to a user.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A comment belongs to a post.
     *
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Determine if the comment was just published a moment ago.
     *
     * @return bool
     */
    public function wasJustPublished()
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }

    /**
     * Determine if the current comment is marked as the best.
     *
     * @return bool
     */
    public function isBest()
    {
        return $this->post->comment_id == $this->id;
    }

    /**
     *
     * Determine if the current reply is marked as the best.
     *
     * @return bool
     */
    public function getIsBestAttribute()
    {
        return $this->isBest();
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
}
