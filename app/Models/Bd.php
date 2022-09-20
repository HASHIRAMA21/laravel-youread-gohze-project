<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
//use App\Models\CategoryBd;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


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