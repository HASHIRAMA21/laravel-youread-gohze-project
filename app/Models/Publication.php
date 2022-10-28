<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Publication
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $publish_date
 * @property string $category
 * @property int|null $status
 * @property string $file
 * @property int|null $views
 * @property int|null $likes
 * @property int|null $dislikes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AudioBook|null $audiobook
 * @property-read \App\Models\Bd|null $bd
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\OeuvreLitteraire|null $oeuvrelitteraire
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\PublicationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereDislikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publication whereViews($value)
 * @mixin \Eloquent
 */
class Publication extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'titre',
        'description',
        'publish_date',
        'category',
        'file',
        'views',
        'likes',
        'dislikes'
    ];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Comment::class);
    }

    public function  users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function bd(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Bd::class);
    }
    public function oeuvrelitteraire(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OeuvreLitteraire::class);
    }
    public function audiobook(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AudioBook::class);
    }

}
