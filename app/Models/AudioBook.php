<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'files',
        'audio'
    ];

    public function publication() {
        return $this->belongsTo(AudioBook::class);
    }
}
