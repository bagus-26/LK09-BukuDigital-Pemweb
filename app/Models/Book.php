<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'category',
        'description',
        'cover',
    ];

    public function getCoverUrlAttribute(): string
    {
        if ($this->cover) {
            return asset('storage/' . $this->cover);
        }
        return asset('images/no-cover.png');
    }
}
