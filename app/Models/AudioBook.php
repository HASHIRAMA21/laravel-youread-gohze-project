<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AudioBook
 *
 * @property int $id
 * @property string $title
 * @property string $authors
 * @property string $file
 * @property string $audio
 * @property string $category
 * @property string $parution_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $publication_id
 * @property-read AudioBook|null $publication
 * @method static \Database\Factories\AudioBookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereAudio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereAuthors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereParutionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook wherePublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AudioBook whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AudioBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'authors',
        'title',
        'description',
        'files',
        'audio',
        'category',
        'parution_date'
    ];

    public function publication() {
        return $this->belongsTo(AudioBook::class);
    }
}
