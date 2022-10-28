<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
//use App\Models\CategoryBd;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * App\Models\Bd
 *
 * @property int $id
 * @property string $title
 * @property string $authors
 * @property string $description
 * @property string $category
 * @property string|null $files
 * @property string $status
 * @property string $publishing_house
 * @property string $parution_date
 * @property int $publication_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Bd|null $bd
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\BdFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bd newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bd query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereAuthors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereParutionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd wherePublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd wherePublishingHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bd whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bd extends Model implements HasMedia
{


    use HasFactory,InteractsWithMedia;

    protected $fillable = [
                   'title',
                   'authors',
                   'description',
                   'category',
                   'file',
                   'status',
                   'publishing_house',
                   'parution_date',
                   'user_id'
    ];

    public function bd() {
        return $this->belongsTo(Bd::class);
    }

    public function categorybd() {
        return $this->BelongsToMany(CategoryBd::class);
    }

}
