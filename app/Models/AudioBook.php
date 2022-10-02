<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
