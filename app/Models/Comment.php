<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $publication_id
 * @property string $comment_text
 * @property int|null $parent_id
 * @property int|null $replied_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CommentLike[] $commentDislikes
 * @property-read int|null $comment_dislikes_count
 * @property-read \App\Models\Publication $publication
 * @property-read \Illuminate\Database\Eloquent\Collection|Comment[] $replies
 * @property-read int|null $replies_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CommentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRepliedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Comment withoutTrashed()
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'publication_id',
        'comment_text',
        'parent_id',
        'replied_to_id'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot() {
        parent::boot();

        static::deleting(function($comment) {
            $comment->replies()->get('id')->each->delete();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publication(): BelongsTo
    {
        return $this->belongsTo(Publication::class);
    }
    public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
    public  function commentLikes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CommentLikes::class)->where('status',1);
    }
    public function commentDislikes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CommentLike::class)->where('status', 0);
    }
    public function isLikedBy(User $user):bool
    {
        return (bool) $user->commentLikes
            ->where('comment_id',$this->id)
            ->where('status',1)
            ->count();
    }

    public function isDislikesBy(User $user):bool
    {
        return (bool) $user->commentDislikes
            ->where('comment_id',$this->id)
            ->whereNotNull('status')
            ->where('status',0)
            ->count();
    }
}
