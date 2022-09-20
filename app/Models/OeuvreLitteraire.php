<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\Validator;


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
