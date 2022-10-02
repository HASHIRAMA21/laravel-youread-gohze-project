<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
