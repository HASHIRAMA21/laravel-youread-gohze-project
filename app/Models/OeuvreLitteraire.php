<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\Validator;


/**
 * App\Models\OeuvreLitteraire
 *
 * @property int $id
 * @property string $title
 * @property string $authors
 * @property string $category
 * @property string $publishing_house
 * @property string $parution_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $publication_id
 * @property-read \App\Models\Bd|null $bd
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\OeuvreLitteraireFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire query()
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereAuthors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereParutionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire wherePublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire wherePublishingHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OeuvreLitteraire whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OeuvreLitteraire extends Model implements HasMedia
{
    use HasFactory;

     
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
}
